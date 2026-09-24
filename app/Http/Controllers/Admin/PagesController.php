<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function clients()
    {
        return view('admin.clients-management');
    }

   public function subscriptionPurchase(Request $request)
{
    // Start query with relationships
    $query = Subscription::with(['site', 'plan', 'user']);

    // Apply search if 'keyword' is present
    if ($request->filled('keyword')) {
        $keyword = $request->keyword;
        $query->where(function ($q) use ($keyword) {
            $q->whereHas('user', function ($q2) use ($keyword) {
                $q2->where('name', 'like', "%{$keyword}%")
                   ->orWhere('email', 'like', "%{$keyword}%");
            })
            ->orWhereHas('site', function ($q2) use ($keyword) {
                $q2->where('name', 'like', "%{$keyword}%");
            })
            ->orWhereHas('plan', function ($q2) use ($keyword) {
                $q2->where('name', 'like', "%{$keyword}%");
            })
            ->orWhere('amount', 'like', "%{$keyword}%")
            ->orWhere('status', 'like', "%{$keyword}%")
            ->orWhere('stripe_subscription_id', 'like', "%{$keyword}%");
        });
    }

    // Paginate results and keep search query in URL
    $subscriptions = $query->orderBy('created_at', 'desc')
                           ->paginate(10)
                           ->withQueryString();

    return view('admin.billing-and-subscription', compact('subscriptions'));
}

    public function technicians()
    {
        return view('admin.technician-management');
    }

    public function sites()
    {
        return view('admin.sites-management');
    }

    public function devices()
    {
        return view('admin.devices-and-sensors');
    }

    public function reports()
    {
        return view('admin.reports-and-insights');
    }

    public function notifications()
    {
        return view('admin.notifications');
    }

    public function billing()
    {
        return view('admin.billing-and-subscription');
    }

    public function users()
    {
        return view('admin.user-management');
    }

    public function support()
    {
        return view('admin.support-tickets');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
