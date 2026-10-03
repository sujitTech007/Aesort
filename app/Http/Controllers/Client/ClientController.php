<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\Subscription;
use App\Models\Meter;
use App\Models\Device;
use App\Models\DeviceReading;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function dashboard(Request $request)
    {
        $filters = $request->validate([
            'site_id' => 'nullable|integer',
            'period' => 'nullable|in:30d,90d,12m',
        ]);
        $userId = Auth::id();
        $allSites = Site::where('user_id', $userId)->where('is_demo', false)->orderBy('name')->get();
        $selectedSite = null;
        if (!empty($filters['site_id'])) {
            $selectedSite = $allSites->firstWhere('id', (int) $filters['site_id']);
            abort_unless($selectedSite, 404);
        }

        $sites = $selectedSite ? collect([$selectedSite]) : $allSites;
        $siteIds = $selectedSite ? collect([$selectedSite->id]) : $sites->pluck('id');
        $devices = Device::whereIn('site_id', $siteIds)->where('is_demo', false)->get();
        $deviceIds = $devices->pluck('id');
        $period = $filters['period'] ?? '30d';
        $periodEnd = now()->endOfDay();
        $periodStart = match ($period) {
            '90d' => $periodEnd->copy()->subDays(89)->startOfDay(),
            '12m' => $periodEnd->copy()->subMonths(11)->startOfMonth(),
            default => $periodEnd->copy()->subDays(29)->startOfDay(),
        };
        $latestReading = DeviceReading::with('device.site')->whereIn('device_id', $deviceIds)->whereBetween('reading_time', [$periodStart, $periodEnd])->orderByDesc('reading_time')->first();
        $latestReportAt = $devices->whereNotNull('last_active')->max('last_active');
        $onboarding = DB::table('onboarding_projects')->where('user_id', $userId)->where('is_demo', false)->orderByDesc('updated_at')->first();
        $actionCount = DB::table('recommendations')->whereIn('site_id', $siteIds)->where('is_demo', false)->whereIn('status', ['open', 'in_progress'])->count();
        $unreadNotifications = \App\Models\Notification::where('user_id', $userId)->where('is_read', false)->count();
        $totalReadings = DeviceReading::whereIn('device_id', $deviceIds)->whereBetween('reading_time', [$periodStart, $periodEnd])->count();
        $periodLabel = $periodStart->format('M d, Y') . ' – ' . $periodEnd->format('M d, Y');

        return view('client.index', compact(
            'allSites', 'sites', 'selectedSite', 'devices', 'latestReading', 'latestReportAt',
            'onboarding', 'actionCount', 'unreadNotifications', 'totalReadings', 'period', 'periodLabel'
        ));
    }
    public function profile()
    {
        return view('client.settings');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:15',
            'company_name' => 'nullable|string|max:255',
        ]);

        $user->update($request->only(['name', 'email', 'phone', 'company_name']));

        return back()->with('success', 'Profile updated successfully.');
    }
    public function changePasswordForm()
    {
        return view('client.change-password');
    }
    // public function changePassword(Request $request)
    // {
    //     // Handle password change logic here
    //     return back()->with('success', 'Password changed successfully.');
    // }
    public function logout(Request $request)
    {
        // Handle client logout logic here
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    // public function sites()
    // {
    //     $sites = Site::orderBy('id', 'desc')->where('user_id', auth()->id())->paginate(15)->withQueryString();
    //     return view('client.my-site', compact('sites'));
    // }
    
    public function sites(Request $request)
    {
        $sites = Site::where('user_id', auth()->id())->where('is_demo', false)
            ->when($request->keyword, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->keyword . '%')
                      ->orWhere('address', 'like', '%' . $request->keyword . '%')
                      ->orWhere('city', 'like', '%' . $request->keyword . '%')
                      ->orWhere('country', 'like', '%' . $request->keyword . '%')
                      ->orWhere('type', 'like', '%' . $request->keyword . '%')
                      ->orWhere('timezone', 'like', '%' . $request->keyword . '%')
                      ->orWhere('portfolio_name', 'like', '%' . $request->keyword . '%')
                      ->orWhere('status', 'like', '%' . $request->keyword . '%');
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(15)
            ->withQueryString();
    
        return view('client.my-site', compact('sites'));
    }

    public function siteDetail($id)
    {
        Site::where('user_id', Auth::id())->where('is_demo', false)->findOrFail($id);

        return redirect()->route('client.sites');
    }
    // public function devices()
    // {
    //     $sites = Site::Where('user_id', auth()->id())->get();
       
    //     $devices = Device::whereIn('site_id', $sites->pluck('id'))->get();
    //     return view('client.devices-and-sensors', compact('sites', 'devices'));
    // }
    public function devices(Request $request)
    {
        $sites = Site::where('user_id', auth()->id())->where('is_demo', false)->get();
    
        $devices = Device::whereIn('site_id', $sites->pluck('id'))->where('is_demo', false)->with('site')
            ->when($request->keyword, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('serial_number', 'like', '%' . $request->keyword . '%')
                      ->orWhere('name', 'like', '%' . $request->keyword . '%')
                      ->orWhere('type', 'like', '%' . $request->keyword . '%')
                      ->orWhere('firmware_version', 'like', '%' . $request->keyword . '%')
                      ->orWhere('status', 'like', '%' . $request->keyword . '%');
                });
            })
            ->get();
    
        return view('client.devices-and-sensors', compact('sites', 'devices'));
    }

    public function deviceDetail($id)
    {
        $device = Device::where('is_demo', false)->whereHas('site', fn ($query) => $query->where('user_id', Auth::id())->where('is_demo', false))->findOrFail($id);

        return redirect()->route('client.energy-readings', ['device_id' => $device->id]);
    }
    
    public function subscriptions()
    {

         $user = Auth::user();

    // Fetch all subscriptions for this user (you can also eager load site and plan)
    $subscriptions = Subscription::with(['site', 'plan'])
        ->where('user_id', $user->id)->where('status', 'succeeded')
        ->whereHas('site', fn ($query) => $query->where('is_demo', false))
        ->orderBy('created_at', 'desc')
        ->get();

        return view('client.billing-and-subscription', compact('subscriptions'));
    }

 public function meters()
    {
        $user = Auth::user();

        return view('client.meter', compact('user'));
    }

    public function energyReadings(Request $request)
    {
        $devices = Device::with('site')
            ->where('is_demo', false)
            ->whereHas('site', fn ($query) => $query->where('user_id', Auth::id())->where('is_demo', false))
            ->orderBy('name')
            ->get();

        $readingsQuery = DeviceReading::with('device.site')
            ->whereIn('device_id', $devices->pluck('id'));

        if ($request->filled('device_id') && $devices->contains('id', (int) $request->query('device_id'))) {
            $readingsQuery->where('device_id', (int) $request->query('device_id'));
        }

        $latestReading = (clone $readingsQuery)->orderByDesc('reading_time')->first();
        $totalReadings = (clone $readingsQuery)->count();
        $readings = $readingsQuery->orderByDesc('reading_time')->paginate(50)->withQueryString();

        return view('client.energy-readings', compact('devices', 'latestReading', 'totalReadings', 'readings'));
    }
    
    
    
    
 public function viewLogs()
    {
        $user = Auth::user();

        return view('client.logs', compact('user'));
    }
 public function viewDevices()
    {
        return redirect()->route('client.devices');
    }
 public function viewSpaces()
    {
        $user = Auth::user();

        return view('client.spaces', compact('user'));
    }
 public function spaceDetail()
    {
        $user = Auth::user();

        return view('client.space-detail', compact('user'));
    }
 public function devDetail()
    {
        return redirect()->route('client.devices');
    }
    
    
    
    
    
    

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|confirmed|min:6',
        ]);

        $user = auth()->user();
        
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }
}
