<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Site;
use App\Models\Device;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            // flash success message
            return redirect()->route('admin.dashboard')->with('success', 'Admin logged in successfully');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $totalClients = User::where('role', 1)->count();
        $totalTechnicians = User::where('role', 2)->count();
        $totalSites = Site::count();
        $totalDevices = Device::count();
        $activeClients = User::where('role', 1)->where('status', 1)->count();
        $activeSites = Site::where('status', 1)->count();
        $totalSubscriptionPlans = SubscriptionPlan::count();
        $totalSubscriptions = Subscription::count();
        $subscriptionValue = (float) Subscription::sum('amount');

        $siteTypes = Site::query()
            ->selectRaw("COALESCE(NULLIF(type, ''), 'Unspecified') as label, COUNT(*) as total")
            ->groupBy('label')
            ->orderBy('label')
            ->get();

        $deviceStatuses = Device::query()
            ->selectRaw("COALESCE(NULLIF(status, ''), 'Unspecified') as label, COUNT(*) as total")
            ->groupBy('label')
            ->orderBy('label')
            ->get();

        $periodStart = now()->startOfMonth()->subMonths(5);
        $periodEnd = now()->endOfMonth();
        $monthKeys = collect(range(0, 5))->map(function ($offset) {
            return now()->startOfMonth()->subMonths(5 - $offset)->format('Y-m');
        });

        $countByMonth = function ($model, $role = null) use ($periodStart, $periodEnd) {
            $query = $model::query()->whereBetween('created_at', [$periodStart, $periodEnd]);
            if ($role !== null) {
                $query->where('role', $role);
            }

            return $query->pluck('created_at')
                ->map(fn ($date) => Carbon::parse($date)->format('Y-m'))
                ->countBy();
        };

        $clientTrend = $countByMonth(User::class, 1);
        $siteTrend = $countByMonth(Site::class);
        $deviceTrend = $countByMonth(Device::class);
        $trendLabels = $monthKeys->map(fn ($month) => Carbon::createFromFormat('Y-m', $month)->format('M Y'));
        $trendSeries = [
            ['name' => 'Customers', 'data' => $monthKeys->map(fn ($month) => $clientTrend->get($month, 0))->values()],
            ['name' => 'Sites', 'data' => $monthKeys->map(fn ($month) => $siteTrend->get($month, 0))->values()],
            ['name' => 'Devices', 'data' => $monthKeys->map(fn ($month) => $deviceTrend->get($month, 0))->values()],
        ];

        return view('admin.kpi-dashboard', compact(
            'totalClients',
            'totalTechnicians',
            'totalSites',
            'totalDevices',
            'activeClients',
            'activeSites',
            'totalSubscriptionPlans',
            'totalSubscriptions',
            'subscriptionValue',
            'siteTypes',
            'deviceStatuses',
            'trendLabels',
            'trendSeries'
        ));
    }


    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    // Update Password
    public function updatePassword(Request $request)
    {
        $request->validate([
            // 'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $admin = Auth::guard('admin')->user();

        // if (!Hash::check($request->current_password, $user->password)) {
        //     return back()->with('error', 'Current password is incorrect.');
        // }

        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return back()->with('success', 'Password updated successfully.');
    }

}
