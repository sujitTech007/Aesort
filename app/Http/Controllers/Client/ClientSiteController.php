<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Site;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ClientSiteController extends Controller
{
    // List all sites
    public function index(Request $request)
    {
        $sites = Site::orderBy('id', 'desc')->where('user_id', auth()->id())->where('is_demo', false)->paginate(15)->withQueryString();
        return view('client.my-site', compact('sites'));  
    }

    // Store new site
    public function store(Request $request)
{
        $data = $request->only(['name','address','city','country','province','portfolio_name','heating_fuel','operating_hours','area_sqft','type','timezone']);

    $validator = Validator::make($data, [
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:100',
        'country' => 'required|string|max:100',
        'province' => 'nullable|string|max:100',
        'portfolio_name' => 'nullable|string|max:150',
        'heating_fuel' => 'nullable|string|max:100',
        'operating_hours' => 'nullable|string|max:255',
        'area_sqft' => 'required|numeric',
        'type' => 'required|in:office,hotel,retail,hospital,school,other',
        'timezone' => 'required|string|max:50',
        'status' => 'nullable|in:0,1',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $site = Site::create([
        'user_id' => Auth::id(),
        'name' => $data['name'],
        'address' => $data['address'],
        'city' => $data['city'],
        'country' => $data['country'],
        'province' => $data['province'] ?? null,
        'portfolio_name' => $data['portfolio_name'] ?? null,
        'heating_fuel' => $data['heating_fuel'] ?? null,
        'operating_hours' => $data['operating_hours'] ?? null,
        'area_sqft' => $data['area_sqft'],
        'type' => $data['type'],
        'timezone' => $data['timezone'],
        'status' => $data['status'] ?? 1,
    ]);

    // return response()->json([
    //     'message' => 'Site created successfully.',
    //     'site' => $site
    // ], 201); // 201 Created
    if ($request->expectsJson()) {
            return response()->json(['message' => 'Site created successfully.', 'site' => $site], 201);
        }

        return redirect()->route('client.sites.index')->with('success', 'Site created successfully.');
}

    // Show a site
    public function show(Site $site)
    {
        abort_unless((int) $site->user_id === (int) Auth::id() && !$site->is_demo, 404);
        return view('client.partials.site-view', compact('site'));
    }

    // Edit form
    public function edit(Site $site)
    {
        abort_unless((int) $site->user_id === (int) Auth::id() && !$site->is_demo, 404);
        return view('client.partials.site-edit', compact('site'));
    }

    // Update site
    public function update(Request $request, Site $site)
    {
        abort_unless((int) $site->user_id === (int) Auth::id() && !$site->is_demo, 404);
        $data = $request->only(['name','address','city','country','province','portfolio_name','heating_fuel','operating_hours','area_sqft','type','timezone']);

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'province' => 'nullable|string|max:100',
            'portfolio_name' => 'nullable|string|max:150',
            'heating_fuel' => 'nullable|string|max:100',
            'operating_hours' => 'nullable|string|max:255',
            'area_sqft' => 'required|numeric',
            'type' => 'required|in:office,hotel,retail,hospital,school,other',
            'timezone' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            return redirect()->back()->withErrors($validator)->withInput()->with('modal', 'editSiteModal-' . $site->id);
        }

        $before = $site->only(['name', 'address', 'city', 'country', 'province', 'portfolio_name', 'area_sqft', 'type', 'timezone', 'heating_fuel', 'operating_hours']);
        $site->update([
            'name' => $data['name'],
            'address' => $data['address'],
            'city' => $data['city'],
            'country' => $data['country'],
            'province' => $data['province'] ?? null,
            'portfolio_name' => $data['portfolio_name'] ?? null,
            'heating_fuel' => $data['heating_fuel'] ?? null,
            'operating_hours' => $data['operating_hours'] ?? null,
            'area_sqft' => $data['area_sqft'],
            'type' => $data['type'],
            'timezone' => $data['timezone'],
        ]);

        DB::table('admin_audit_logs')->insert([
            'admin_id' => null,
            'entity_type' => 'site',
            'entity_id' => $site->id,
            'event' => 'client_context_updated',
            'reason' => 'Site context updated by the owning customer.',
            'before_values' => json_encode($before),
            'after_values' => json_encode($site->only(array_keys($before))),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Site updated successfully.', 'site' => $site], 200);
        }

        return redirect()->route('client.sites.index')->with('success', 'Site updated successfully.');
    }

    // Delete site
    public function destroy(Site $site)
    {
        abort_unless((int) $site->user_id === (int) Auth::id() && !$site->is_demo, 404);
        $site->delete();

        if (request()->expectsJson()) {
            return response()->json(['message' => 'Site deleted successfully.']);
        }

        return redirect()->route('client.sites.index')->with('success', 'Site deleted successfully.');
    }
}
