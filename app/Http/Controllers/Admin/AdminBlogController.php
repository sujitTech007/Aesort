<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;

class AdminBlogController extends Controller
{
   public function index(Request $request)
{
    // Start query for blogs
    $query = \App\Models\Blog::query();

    // Apply search if 'keyword' is present
    if ($request->filled('keyword')) {
        $keyword = $request->keyword;
        $query->where(function ($q) use ($keyword) {
            $q->where('title', 'like', "%{$keyword}%")
              ->orWhere('description', 'like', "%{$keyword}%")
              ->orWhere('content', 'like', "%{$keyword}%");
        });
    }

    // Paginate results and keep search query in URL
    $blogs = $query->orderBy('id', 'desc')
                   ->paginate(10)
                   ->withQueryString();

    return view('admin.blog.index', compact('blogs'));
}
    public function view($id)
    {
        $blog = \App\Models\Blog::findOrFail($id);
        return view('admin.blog.view', compact('blog'));
    }

    public function edit($id)
    {
        $blog = \App\Models\Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        $blog = \App\Models\Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->content = $request->content;
        $blog->status = $request->status;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/blog-images'), $imageName);
            $blog->image = $imageName;
        }

        $blog->save();

        return redirect()->route('admin.blog.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = \App\Models\Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully.');
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required',
        ]);

        $blog = new \App\Models\Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->content = $request->content;
        $blog->status = $request->status;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/blog-images'), $imageName);
            $blog->image = $imageName;
        }

        $blog->save();

        return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully.');
    }

    


}