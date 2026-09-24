<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;

class SubscriptionPlanController extends Controller
{
    public function index()
    {
        $plans = SubscriptionPlan::where('status', '1')->orderBy('id', 'desc')->paginate(10);
        return view('admin.subscription.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.subscription.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'features' => 'required|array|min:1',
            'features.*' => 'required|string|max:255',
            'from_sqft' => 'required',
            'to_sqft' => 'required',
            
        ]);

        SubscriptionPlan::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'features' => $request->features,
            'from_sqft' => $request->from_sqft,
            'to_sqft' => $request->to_sqft,
        ]);

        return redirect()->back()->with('success', 'Plan created successfully!');
    }

    public function edit(SubscriptionPlan $subscriptionPlan)
    {
        return view('admin.subscription.edit', compact('subscriptionPlan'));
    }

    public function update(Request $request, SubscriptionPlan $subscriptionPlan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'features' => 'required|array|min:1',
            'features.*' => 'required|string|max:255',
            'from_sqft' => 'required',
            'to_sqft' => 'required',
        ]);

        $subscriptionPlan->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'features' => $request->features,
            'from_sqft' => $request->from_sqft,
            'to_sqft' => $request->to_sqft,
        ]);

        return redirect()->back()->with('success', 'Plan updated successfully!');
    }

    public function destroy(SubscriptionPlan $subscriptionPlan)
    {
        $subscriptionPlan->delete();
        return redirect()->route('admin.subscription_plans.index')->with('success', 'Plan deleted successfully!');
    }
}
