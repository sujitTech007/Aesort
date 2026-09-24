<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\Subscription;
use App\Models\Meter;
use App\Models\Device;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function dashboard()
    {
        $totalSites = Site::where('user_id', auth()->id())->count();
        return view('client.index', compact('totalSites'));
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
        $sites = Site::where('user_id', auth()->id())
            ->when($request->keyword, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->keyword . '%')
                      ->orWhere('address', 'like', '%' . $request->keyword . '%')
                      ->orWhere('city', 'like', '%' . $request->keyword . '%')
                      ->orWhere('country', 'like', '%' . $request->keyword . '%')
                      ->orWhere('type', 'like', '%' . $request->keyword . '%')
                      ->orWhere('timezone', 'like', '%' . $request->keyword . '%')
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
        // Fetch site details by $id
        return view('client.site-detail', compact('id'));
    }
    // public function devices()
    // {
    //     $sites = Site::Where('user_id', auth()->id())->get();
       
    //     $devices = Device::whereIn('site_id', $sites->pluck('id'))->get();
    //     return view('client.devices-and-sensors', compact('sites', 'devices'));
    // }
    public function devices(Request $request)
    {
        $sites = Site::where('user_id', auth()->id())->get();
    
        $devices = Device::whereIn('site_id', $sites->pluck('id'))
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
        // Fetch device details by $id
        return view('client.device-detail', compact('id'));
    }
    
    public function subscriptions()
    {

         $user = Auth::user();

    // Fetch all subscriptions for this user (you can also eager load site and plan)
    $subscriptions = Subscription::with(['site', 'plan'])
        ->where('user_id', $user->id)->where('status', 'succeeded')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('client.billing-and-subscription', compact('subscriptions'));
    }

 public function meters()
    {
        $user = Auth::user();

        return view('client.meter', compact('user'));
    }
    
    
    
    
 public function viewLogs()
    {
        $user = Auth::user();

        return view('client.logs', compact('user'));
    }
 public function viewDevices()
    {
        $user = Auth::user();

        return view('client.devices', compact('user'));
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
        $user = Auth::user();

        return view('client.device-detail', compact('user'));
    }
    
    
    
    
    
    

    public function changePassword(Request $request)
    {
        $request->validate([
            // 'current_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ]);

        $user = auth()->user();
        
        // if (!Hash::check($request->current_password, $user->password)) {
        //     return back()->with('error', 'Current password is incorrect.');
        // }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }
}
