<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Str;


class AdminServiceController extends Controller
{
    public function index(Request $request)
{
    // Start query for blogs
    $query = \App\Models\Service::query();

    // Apply search if 'keyword' is present
    if ($request->filled('keyword')) {
        $keyword = $request->keyword;
        $query->where(function ($q) use ($keyword) {
            $q->where('title', 'like', "%{$keyword}%")
              ->orWhere('short_description', 'like', "%{$keyword}%")
              ->orWhere('description', 'like', "%{$keyword}%");
        });
    }

    // Paginate results and keep search query in URL
    $services = $query->orderBy('id', 'desc')
                   ->paginate(10)
                   ->withQueryString();

    return view('admin.services.index', compact('services'));
}
    public function view($id)
    {
        $service = \App\Models\Service::findOrFail($id);
        return view('admin.services.view', compact('service'));
    }

    public function edit($id)
    {
        $service = \App\Models\Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required',
        ]);

        $service = \App\Models\Service::findOrFail($id);
        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->status = $request->status;
        if ($request->hasFile('banner_image')) {
            $imageName = time().'.'.$request->banner_image->extension();
            $request->banner_image->move(public_path('uploads/service-images'), $imageName);
            $service->banner_image = $imageName;
        }
        
            if ($request->hasFile('icon')) {
        if ($service->icon && file_exists(public_path('uploads/service-icons/'.$service->icon))) {
            unlink(public_path('uploads/service-icons/'.$service->icon));
        }

        $iconName = time().'_icon.'.$request->icon->extension();
        $request->icon->move(public_path('uploads/service-icons'), $iconName);
        $service->icon = $iconName;
        }
        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $service = \App\Models\Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.service.index')->with('success', 'Service deleted successfully.');
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required',
        ]);

        $service = new \App\Models\Service();
        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->status = $request->status;

        if ($request->hasFile('banner_image')) {
            $imageName = time().'.'.$request->banner_image->extension();
            $request->banner_image->move(public_path('uploads/service-images'), $imageName);
            $service->banner_image = $imageName;
        }
        if ($request->hasFile('icon')) {
            $iconName = time().'_icon.'.$request->icon->extension();
            $request->icon->move(public_path('uploads/service-icons'), $iconName);
            $service->icon = $iconName;
        }

        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    

}
