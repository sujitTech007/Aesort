<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        
            $sites = Site::where('is_demo', false)->get();
            $clients = User::where('role', 1)->where('status', 1)->get();
        
            // AJAX request → return only table
            if ($request->ajax()) {
                return view('admin.partials.devices-table', compact('devices'))->render();
            }
        
            return view('admin.devices-and-sensors', compact('devices', 'sites', 'clients'));
        }
        
        
        public function store(Request $request)
        {

            $validator = Validator::make($request->all(), [
                'site_id' => 'required|integer|exists:sites,id',
                'serial_number' => 'required|string|unique:devices',
                'name' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'asset_name' => 'nullable|string|max:255',
                'source_unit' => 'nullable|string|max:32',
                'reading_interval_minutes' => 'nullable|integer|min:1|max:1440',
                'firmware_version' => 'nullable|string',
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
                'asset_name'       => $request->asset_name,
                'source_unit'      => $request->source_unit,
                'reading_interval_minutes' => $request->reading_interval_minutes,
                'firmware_version' => $request->firmware_version,
                'installed_at'     => $request->installed_at,
                'status'           => 'unknown',
            ]);

            DB::table('admin_audit_logs')->insert([
                'admin_id' => Auth::guard('admin')->id(),
                'entity_type' => 'device',
                'entity_id' => $device->id,
                'event' => 'commissioned',
                'reason' => 'Device commissioned. Connectivity remains unknown until the device reports.',
                'after_values' => json_encode($device->only(['site_id', 'serial_number', 'name', 'type', 'asset_name', 'source_unit', 'reading_interval_minutes', 'firmware_version', 'installed_at', 'status'])),
                'created_at' => now(),
                'updated_at' => now(),
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
            'site_id' => 'required|integer|exists:sites,id',
            'serial_number' => 'required|string|unique:devices,serial_number,' . $id,
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'asset_name' => 'nullable|string|max:255',
            'source_unit' => 'nullable|string|max:32',
            'reading_interval_minutes' => 'nullable|integer|min:1|max:1440',
            'firmware_version' => 'nullable|string',
            'change_reason' => 'required|string|min:8|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $changes = $request->only(['site_id', 'serial_number', 'name', 'type', 'asset_name', 'source_unit', 'reading_interval_minutes', 'firmware_version']);
        $before = $device->only(array_keys($changes));
        $device->update($changes);
        if ($device->wasChanged()) {
            DB::table('admin_audit_logs')->insert([
                'admin_id' => Auth::guard('admin')->id(),
                'entity_type' => 'device',
                'entity_id' => $device->id,
                'event' => 'configuration_updated',
                'reason' => $request->input('change_reason'),
                'before_values' => json_encode($before),
                'after_values' => json_encode($device->only(array_keys($changes))),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Device updated successfully.', 'device' => $device], 200);
        }

        return redirect()->route('admin.devices.index')->with('success', 'Device updated successfully.');
    }
    
    public function getSitesByUser($userId)
{
    $sites = \App\Models\Site::where('user_id', $userId)->where('is_demo', false)->get();

    return response()->json($sites);
}


    public function destroy($id)
    {
        $device = Device::findOrFail($id);
        $before = $device->only(['status']);
        $device->update(['status' => 'archived']);
        DB::table('admin_audit_logs')->insert([
            'admin_id' => Auth::guard('admin')->id(),
            'entity_type' => 'device',
            'entity_id' => $device->id,
            'event' => 'archived',
            'reason' => 'Device archived to preserve its readings and history.',
            'before_values' => json_encode($before),
            'after_values' => json_encode($device->only(['status'])),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return response()->json(['message' => 'Device archived successfully.']);
    }
}
