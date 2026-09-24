<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Site;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class AdminDeviceController extends Controller
{
        public function index(Request $request)
        {
            $keyword = $request->keyword;
        
            $devices = Device::with('site')
                ->when($keyword, function ($query) use ($keyword) {
                    $query->where('serial_number', 'like', "%{$keyword}%")
                          ->orWhere('name', 'like', "%{$keyword}%")
                          ->orWhere('type', 'like', "%{$keyword}%")
                          ->orWhereHas('site', function ($q) use ($keyword) {
                              $q->where('name', 'like', "%{$keyword}%");
                          });
                })
                ->orderBy('id', 'desc')
                ->paginate(10)
                ->withQueryString();
        
            $sites = Site::all();
            $clients = User::where('role', 1)->get();
        
            // AJAX request → return only table
            if ($request->ajax()) {
                return view('admin.partials.devices-table', compact('devices'))->render();
            }
        
            return view('admin.devices-and-sensors', compact('devices', 'sites', 'clients'));
        }
        
        
        public function store(Request $request)
        {

            $validator = Validator::make($request->all(), [
                'site_id' => 'required|integer',
                'serial_number' => 'required|string|unique:devices',
                'name' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'firmware_version' => 'nullable|string',
                'last_active' => 'nullable|date',
                'status' => 'required',
                'installed_at' => 'nullable|date',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // $device = Device::create($request->all());
          $device = Device::create([
                'user_id'          => $request->user_id,
                'site_id'          => $request->site_id,
                'serial_number'    => $request->serial_number,
                'name'             => $request->name,
                'type'             => $request->type,
                'firmware_version' => $request->firmware_version,
                'last_active'      => $request->last_active,
                'installed_at'     => $request->installed_at,
                'status'           => $request->status,
            ]);
            

            return response()->json(['message' => 'Device created successfully!', 'device' => $device]);
        }

    public function show(Device $device)
    {      

        return view('admin.partials.device-view', compact('device'));
    }

     public function edit(Device $device, $sites)
    {
    
        return view('admin.partials.device-edit', compact('device', 'sites'));
    }

    public function update(Request $request, $id)
    {
        $device = Device::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'site_id' => 'required|integer',
            'serial_number' => 'required|string|unique:devices,serial_number,' . $id,
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'firmware_version' => 'nullable|string',
            'last_active' => 'nullable|date',
            'status' => 'required|string',
            'installed_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $device->update($request->all());

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Device updated successfully.', 'device' => $device], 200);
        }

        return redirect()->route('admin.devices.index')->with('success', 'Device updated successfully.');
    }
    
    public function getSitesByUser($userId)
{
    $sites = \App\Models\Site::where('user_id', $userId)->get();

    return response()->json($sites);
}


    public function destroy($id)
    {
        $device = Device::findOrFail($id);
        $device->delete();
        return response()->json(['message' => 'Device deleted successfully!']);
    }
}
