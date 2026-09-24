<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use App\Models\Subscription;
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

    // Retrieve from Laravel session
    $plan_id = session('stripe_plan_id');
    $site_id = session('stripe_site_id');
    $amount = session('stripe_amount');
    $stripe_session_id = session('stripe_session_id');

    if (!$stripe_session_id) {
        return redirect()->route('client.sites.index')->with('error','Payment session not found!');
    }

    // Check if subscription already exists
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

    // Clear session data
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
