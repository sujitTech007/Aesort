<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Site;
use Illuminate\Support\Facades\Validator;

class AdminSiteController extends Controller
{
    // List all sites
    // public function index(Request $request)
    // {
    //     $query = Site::query();

    //     if ($request->filled('q')) {
    //         $q = $request->input('q');
    //         $query->where(function ($sub) use ($q) {
    //             $sub->where('name', 'like', "%{$q}%")
    //                 ->orWhere('address', 'like', "%{$q}%")
    //                 ->orWhere('city', 'like', "%{$q}%")
    //                 ->orWhere('country', 'like', "%{$q}%")
    //                 ->orWhere('area_sqft', 'like', "%{$q}%")
    //                 ->orWhere('type', 'like', "%{$q}%")
    //                 ->orWhere('timezone', 'like', "%{$q}%");
    //         });
    //     }

    //     $sites = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();

    //     $users = User::where('role', 1)->get(); // For user_id dropdown
    //     return view('admin.sites-management', compact('sites', 'users'));
    // }
    
    public function index(Request $request)
    {
        // Start query for Sites
        $query = Site::query();
    
        // Apply search if 'keyword' is present
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($subQuery) use ($keyword) {
                $subQuery->where('name', 'like', "%{$keyword}%")
                         ->orWhere('address', 'like', "%{$keyword}%")
                         ->orWhere('city', 'like', "%{$keyword}%")
                         ->orWhere('country', 'like', "%{$keyword}%")
                         ->orWhere('area_sqft', 'like', "%{$keyword}%")
                         ->orWhere('type', 'like', "%{$keyword}%")
                         ->orWhere('timezone', 'like', "%{$keyword}%");
            });
        }
    
        // Paginate results and keep query string
        $sites = $query->orderBy('id', 'desc')
                       ->paginate(10)
                       ->withQueryString();
    
        // Users for dropdown (role = 1)
        $users = User::where('role', 1)->get();
    
        return view('admin.sites-management', compact('sites', 'users'));
    }




    // Store new site
    public function store(Request $request)
{
    $data = $request->only(['user_id','name','address','city','country','area_sqft','type','timezone','status']);

    $validator = Validator::make($data, [
        'user_id' => 'required|exists:users,id',
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:100',
        'country' => 'required|string|max:100',
        'area_sqft' => 'required|numeric',
        'type' => 'required|in:office,hotel,retail,hospital,school,other',
        'timezone' => 'required|string|max:50',
        'status' => 'nullable|in:0,1',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $site = Site::create([
        'user_id' => $data['user_id'],
        'name' => $data['name'],
        'address' => $data['address'],
        'city' => $data['city'],
        'country' => $data['country'],
        'area_sqft' => $data['area_sqft'],
        'type' => $data['type'],
        'timezone' => $data['timezone'],
        'status' => $data['status'] ?? 1,
    ]);

    if ($request->expectsJson()) {
    return response()->json([
        'message' => 'Site created successfully.',
        'site' => $site
    ], 201);
}

return redirect()->route('admin.sites.index')->with('success', 'Site created successfully.');
}

    // Show a site
    public function show(Site $site)
    {
        return view('admin.partials.site-view', compact('site'));
    }

    // Edit form
    public function edit(Site $site)
    {
        return view('admin.partials.site-edit', compact('site'));
    }

    // Update site
    public function update(Request $request, Site $site)
    {
        $data = $request->only(['user_id','name','address','city','country','area_sqft','type','timezone','status']);

        $validator = Validator::make($data, [
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'area_sqft' => 'required|numeric',
            'type' => 'required|in:office,hotel,retail,hospital,school,other',
            'timezone' => 'required|string|max:50',
            'status' => 'nullable|in:0,1',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            return redirect()->back()->withErrors($validator)->withInput()->with('modal', 'editSiteModal-' . $site->id);
        }

        $site->update([
            'user_id' => $data['user_id'],
            'name' => $data['name'],
            'address' => $data['address'],
            'city' => $data['city'],
            'country' => $data['country'],
            'area_sqft' => $data['area_sqft'],
            'type' => $data['type'],
            'timezone' => $data['timezone'],
            'status' => $data['status'] ?? 1,
        ]);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Site updated successfully.', 'site' => $site], 200);
        }

        return redirect()->route('admin.sites.index')->with('success', 'Site updated successfully.');
    }

    // Delete site
    public function destroy(Site $site)
    {
        $site->delete();

        if (request()->expectsJson()) {
            return response()->json(['message' => 'Site deleted successfully.']);
        }

        return redirect()->route('admin.sites.index')->with('success', 'Site deleted successfully.');
    }
}
