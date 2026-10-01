<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use App\Models\AdminAuditLog;
use Illuminate\Support\Facades\Auth;

class SubscriptionPlanController extends Controller
{
    public function index()
    {
        $plans = SubscriptionPlan::where('status', 1)->orderBy('id', 'desc')->paginate(10);
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
            'amount' => 'required|numeric|min:0',
            'features' => 'required|array|min:1',
            'features.*' => 'required|string|max:255',
            'from_sqft' => 'required|integer|min:0',
            'to_sqft' => 'required|integer|gt:from_sqft',
        ]);

        $plan = SubscriptionPlan::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'features' => $request->features,
            'from_sqft' => $request->from_sqft,
            'to_sqft' => $request->to_sqft,
            'currency_code' => 'USD',
            'status' => 1,
            'pricing_status' => 'draft',
            'created_by' => Auth::guard('admin')->id(),
        ]);

        AdminAuditLog::create([
            'admin_id' => Auth::guard('admin')->id(),
            'entity_type' => 'subscription_plan',
            'entity_id' => $plan->id,
            'event' => 'created',
            'reason' => 'Plan created as an unapproved pricing proposal.',
            'after_values' => $plan->only(['name', 'amount', 'currency_code', 'from_sqft', 'to_sqft', 'pricing_status']),
        ]);

        return redirect()->route('admin.subscription_plans.index')->with('success', 'Pricing proposal created. A different administrator must approve it before checkout.');
    }

    public function edit(SubscriptionPlan $subscriptionPlan)
    {
        return view('admin.subscription.edit', compact('subscriptionPlan'));
    }

    public function update(Request $request, SubscriptionPlan $subscriptionPlan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'features' => 'required|array|min:1',
            'features.*' => 'required|string|max:255',
            'from_sqft' => 'required|integer|min:0',
            'to_sqft' => 'required|integer|gt:from_sqft',
            'change_reason' => 'required|string|min:8|max:1000',
        ]);

        $before = $subscriptionPlan->only(['name', 'amount', 'currency_code', 'from_sqft', 'to_sqft', 'pricing_status']);
        $subscriptionPlan->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'features' => $request->features,
            'from_sqft' => $request->from_sqft,
            'to_sqft' => $request->to_sqft,
            'currency_code' => 'USD',
            'pricing_status' => 'draft',
            'created_by' => Auth::guard('admin')->id(),
            'pricing_approved_by' => null,
            'pricing_approved_at' => null,
        ]);

        AdminAuditLog::create([
            'admin_id' => Auth::guard('admin')->id(),
            'entity_type' => 'subscription_plan',
            'entity_id' => $subscriptionPlan->id,
            'event' => 'updated',
            'reason' => $request->change_reason,
            'before_values' => $before,
            'after_values' => $subscriptionPlan->only(['name', 'amount', 'currency_code', 'from_sqft', 'to_sqft', 'pricing_status']),
        ]);

        return redirect()->route('admin.subscription_plans.index')->with('success', 'Proposal updated and returned to draft pending independent approval.');
    }

    public function approvePricing(Request $request, SubscriptionPlan $subscriptionPlan)
    {
        $request->validate(['approval_reason' => 'required|string|min:8|max:1000']);
        $adminId = Auth::guard('admin')->id();
        $adminCount = \App\Models\Admin::count();
        abort_if(!$subscriptionPlan->created_by, 403, 'This proposal has no recorded creator; edit and resubmit it before approval.');
        abort_if((int) $subscriptionPlan->created_by === (int) $adminId && $adminCount > 1, 403, 'A different administrator must approve this pricing proposal.');
        abort_unless($subscriptionPlan->pricing_status === 'draft', 409, 'Only draft pricing proposals can be approved.');

        $subscriptionPlan->update([
            'pricing_status' => 'approved',
            'pricing_approved_by' => $adminId,
            'pricing_approved_at' => now(),
        ]);

        AdminAuditLog::create([
            'admin_id' => $adminId,
            'entity_type' => 'subscription_plan',
            'entity_id' => $subscriptionPlan->id,
            'event' => 'pricing_approved',
            'reason' => $adminCount === 1 && (int) $subscriptionPlan->created_by === (int) $adminId
                ? '[SINGLE-ADMIN EXCEPTION] ' . $request->approval_reason
                : $request->approval_reason,
            'after_values' => $subscriptionPlan->only(['pricing_status', 'pricing_approved_by', 'pricing_approved_at']),
        ]);

        return redirect()->route('admin.subscription_plans.index')->with('success', 'Pricing approved for checkout.');
    }

    public function destroy(SubscriptionPlan $subscriptionPlan)
    {
        $before = $subscriptionPlan->only(['name', 'amount', 'status', 'pricing_status']);
        $subscriptionPlan->update(['status' => 0, 'pricing_status' => 'archived']);
        AdminAuditLog::create([
            'admin_id' => Auth::guard('admin')->id(),
            'entity_type' => 'subscription_plan',
            'entity_id' => $subscriptionPlan->id,
            'event' => 'archived',
            'reason' => 'Plan archived; history retained.',
            'before_values' => $before,
            'after_values' => $subscriptionPlan->only(['name', 'amount', 'status', 'pricing_status']),
        ]);
        return redirect()->route('admin.subscription_plans.index')->with('success', 'Plan archived; its history was retained.');
    }
}
