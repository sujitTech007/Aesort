<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;
use Stripe\Subscription as StripeSubscription;

class StripeController extends Controller
{
    public function index()
    {
        return view('stripe');
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        abort_unless($user, 401);

        $data = $request->validate([
            'plan_id' => 'required|integer|exists:subscription_plans,id',
            'site_id' => 'required|integer|exists:sites,id',
        ]);

        $plan = SubscriptionPlan::where('status', 1)
            ->where('pricing_status', 'approved')
            ->findOrFail($data['plan_id']);
        $site = Site::where('user_id', $user->id)->findOrFail($data['site_id']);
        $area = (int) $site->area_sqft;

        abort_unless(
            $area >= (int) $plan->from_sqft && ($plan->to_sqft === null || $area <= (int) $plan->to_sqft),
            422,
            'This approved plan does not apply to the selected site area.'
        );

        Stripe::setApiKey(config('services.stripe.secret'));
        $currency = strtolower($plan->currency_code ?: 'USD');
        $amountInMinorUnits = (int) round((float) $plan->amount * 100);

        $checkout = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => $currency,
                    'product_data' => ['name' => $plan->name],
                    'unit_amount' => $amountInMinorUnits,
                    'recurring' => ['interval' => 'month'],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'subscription',
            'metadata' => [
                'user_id' => (string) $user->id,
                'site_id' => (string) $site->id,
                'plan_id' => (string) $plan->id,
            ],
            'success_url' => url('/stripe/success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url' => url('/stripe/cancel'),
        ]);

        session(['stripe_session_id' => $checkout->id]);

        return redirect($checkout->url);
    }

    public function success(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Sign in to confirm your subscription.');
        }

        $checkoutId = $request->query('session_id');
        abort_unless(
            $checkoutId && hash_equals((string) session('stripe_session_id', ''), (string) $checkoutId),
            403,
            'Checkout session does not match this account session.'
        );

        Stripe::setApiKey(config('services.stripe.secret'));
        $checkout = StripeSession::retrieve($checkoutId);
        abort_unless(($checkout->payment_status ?? null) === 'paid', 402, 'Stripe has not confirmed payment for this checkout.');

        $metadata = $checkout->metadata ?? null;
        abort_unless($metadata, 400, 'Stripe checkout metadata is missing.');
        abort_unless((string) ($metadata->user_id ?? '') === (string) $user->id, 403, 'This checkout does not belong to this user.');

        $site = Site::where('user_id', $user->id)->find((int) ($metadata->site_id ?? 0));
        abort_unless($site, 404, 'Selected site could not be found for this account.');

        $plan = SubscriptionPlan::where('status', 1)->where('pricing_status', 'approved')->find((int) ($metadata->plan_id ?? 0));
        abort_unless($plan, 404, 'The approved plan for this checkout is no longer available.');
        abort_unless($site->area_sqft >= $plan->from_sqft && ($plan->to_sqft === null || $site->area_sqft <= $plan->to_sqft), 422, 'This approved plan does not apply to the selected site area.');

        $amountTotal = (int) ($checkout->amount_total ?? 0);
        $expectedAmount = (int) round((float) $plan->amount * 100);
        abort_unless($amountTotal === $expectedAmount, 400, 'Stripe amount does not match the approved plan price.');

        $stripeSubscriptionId = $checkout->subscription;
        $periodEnd = now()->addMonth();

        if ($stripeSubscriptionId) {
            $stripeSubscription = StripeSubscription::retrieve($stripeSubscriptionId);
            if (!empty($stripeSubscription->current_period_end)) {
                $periodEnd = Carbon::createFromTimestamp($stripeSubscription->current_period_end);
            }
        }

        $subscriptionReference = $stripeSubscriptionId ?: $checkoutId;
        $subscription = Subscription::firstOrNew(['stripe_subscription_id' => $subscriptionReference]);
        $subscription->fill([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'site_id' => $site->id,
            'amount' => round((float) ($checkout->amount_total ?? 0) / 100, 2),
            'currency_code' => strtoupper($checkout->currency ?: ($plan->currency_code ?: 'USD')),
            'status' => 'succeeded',
            'start_date' => $subscription->exists ? $subscription->start_date ?? now() : now(),
            'end_date' => $periodEnd,
            'stripe_subscription_id' => $subscriptionReference,
        ]);
        $subscription->save();

        session()->forget('stripe_session_id');

        return redirect()->route('client.sites')->with('success', 'Payment verified and subscription recorded.');
    }

    public function cancel()
    {
        session()->forget('stripe_session_id');

        return redirect()->route('client.sites')->with('error', 'Payment cancelled.');
    }
}
