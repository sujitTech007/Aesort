<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\Site;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StripeController extends Controller
{
    public function index()
    {
        return view('stripe');
    }

   public function checkout(Request $request)
{
    $amount = $request->amount * 100; // Stripe expects amount in cents
    $user = Auth::user();

    Stripe::setApiKey(env('STRIPE_SECRET'));

    // Store info in Laravel session
    session([
        'stripe_plan_id' => $request->plan_id,
        'stripe_site_id' => $request->site_id,
        'stripe_amount' => $request->amount,
    ]);

    $session = StripeSession::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => ['name' => 'Subscription Payment'],
                'unit_amount' => $amount,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => url('/stripe/success'),
        'cancel_url' => url('/stripe/cancel'),
    ]);

    // Save Stripe session ID in Laravel session (not URL)
    session(['stripe_session_id' => $session->id]);

    return redirect($session->url);
}



   public function success()
{
    $user = Auth::user();

    $plan_id = session('stripe_plan_id');
    $site_id = session('stripe_site_id');
    $amount = session('stripe_amount');
    $stripe_session_id = session('stripe_session_id');

    if (!$stripe_session_id) {
        return redirect()->route('client.sites.index')->with('error','Payment session not found!');
    }

    $plan = null;
    if (!empty($plan_id) && $plan_id != 0) {
        $plan = SubscriptionPlan::find($plan_id);
    }

    if (!$plan) {
        $site = Site::find($site_id);
        $area = (int) ($site->area_sqft ?? 0);
        $fallbackAmount = (float) ($amount ?: 399);

        $plan = SubscriptionPlan::query()->firstOrCreate(
            [
                'name' => $area <= 2000 ? 'Default Up to 2,000 sq ft' : 'Default Up to 5,000 sq ft',
            ],
            [
                'amount' => $fallbackAmount,
                'features' => [$area <= 2000 ? 'Standard monitoring' : 'Enhanced monitoring'],
                'from_sqft' => 0,
                'to_sqft' => $area <= 2000 ? 2000 : 5000,
            ]
        );
        $plan_id = $plan->id;
        session(['stripe_plan_id' => $plan_id]);
    }

    $existing = Subscription::where('stripe_subscription_id', $stripe_session_id)->first();
    if (!$existing) {
        $now = Carbon::now();
        Subscription::create([
            'user_id' => $user->id,
            'plan_id' => $plan_id,
            'site_id' => $site_id,
            'amount' => $amount,
            'status' => 'succeeded',
            'start_date' => $now,
            'end_date' => $now->copy()->addMonth(),
            'stripe_subscription_id' => $stripe_session_id,
        ]);
    }

    session()->forget(['stripe_plan_id', 'stripe_site_id', 'stripe_amount', 'stripe_session_id']);

    return redirect()->route('client.sites.index')->with('success','Payment Successful!');
}

public function cancel()
{
    // Optional: clear session
    session()->forget(['stripe_plan_id', 'stripe_site_id', 'stripe_amount', 'stripe_session_id']);
    
    return redirect()->route('client.sites.index')->with('error','Payment Cancelled!');
}

}
