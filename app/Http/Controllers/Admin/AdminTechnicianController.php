<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminTechnicianController extends Controller
{
    /**
     * Display a listing of the technicians.
     */
    // public function index(Request $request)
    // {
    //     $keyword = $request->keyword; // matches form input name
    
    //     $technicians = User::where('role', 2)
    //         ->when($keyword, function ($query, $keyword) {
    //             $query->where('name', 'like', "%{$keyword}%")
    //                   ->orWhere('email', 'like', "%{$keyword}%")
    //                   ->orWhere('phone', 'like', "%{$keyword}%")
    //                   ->orWhere('company_name', 'like', "%{$keyword}%");
    //         })
    //         ->orderBy('id', 'desc')
    //         ->paginate(10)
    //         ->withQueryString();
    
    //     $index = ($technicians->currentPage() - 1) * $technicians->perPage() + 1;
    
    //     return view('admin.technician-management', compact('technicians', 'index'));
    // }
    public function index(Request $request)
{
    $keyword = $request->keyword;

    $technicians = User::where('role', 2)
        ->when($keyword, function ($query, $keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                  ->orWhere('email', 'like', "%{$keyword}%")
                  ->orWhere('phone', 'like', "%{$keyword}%")
                  ->orWhere('company_name', 'like', "%{$keyword}%");
            });
        })
        ->orderBy('id', 'desc')
        ->paginate(10)
        ->withQueryString();

    $index = ($technicians->currentPage() - 1) * $technicians->perPage() + 1;

    return view('admin.technician-management', compact('technicians', 'index'));
}

    /**
     * Store a newly created technician in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['name', 'email', 'phone', 'company_name', 'status', 'password']);

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|unique:users,phone',
            'company_name' => 'nullable|string|max:255',
            'status' => 'nullable|in:0,1',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            return redirect()->back()->withErrors($validator)->withInput()->with('modal', 'createClientModal');
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'company_name' => $data['company_name'] ?? null,
            'status' => $data['status'] ?? 1,
            'role' => 2, // Technician
            'password' => Hash::make($data['password']),
        ]);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Technician created successfully.', 'technician' => $user], 201);
        }

        return redirect()->route('admin.technicians.index')->with('success', 'Technician created successfully.');
    }

    /**
     * Display the specified client.
     */
    public function show(User $technician)
    {
        // Ensure requested user is a technician
        if ($technician->role != 2) {
            abort(404);
        }

        return view('admin.partials.technician-view', compact('technician'));
    }

    /**
     * Show the form for editing the specified client.
     */
    public function edit(User $technician)
    {
        if ($technician->role != 2) {
            abort(404);
        }

        return view('admin.partials.technician-edit', compact('technician'));
    }

    /**
     * Update the specified client in storage.
     */
    public function update(Request $request, User $technician)
    {
        if ($technician->role != 2) {
            abort(404);
        }

        $data = $request->only(['name', 'email', 'phone', 'company_name', 'status', 'password']);

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $technician->id,
            'phone' => 'nullable|string|unique:users,phone,' . $technician->id,
            'company_name' => 'nullable|string|max:255',
            'status' => 'nullable|in:0,1',
            'password' => 'nullable|string|min:6',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            return redirect()->back()->withErrors($validator)->withInput()->with('modal', 'editTechnicianModal-' . $technician->id);
        }

        $technician->name = $data['name'];
        $technician->email = $data['email'];
        $technician->phone = $data['phone'] ?? null;
        $technician->company_name = $data['company_name'] ?? null;
        $technician->status = $data['status'] ?? 1;

        if (!empty($data['password'])) {
            $technician->password = Hash::make($data['password']);
        }

        $technician->save();

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Technician updated successfully.', 'technician' => $technician], 200);
        }

        return redirect()->route('admin.technicians.index')->with('success', 'Technician updated successfully.');
    }

    /**
     * Remove the specified client from storage.
     */
   public function destroy($id)
{
    $technician = User::findOrFail($id);
    $technician->delete();

    if (request()->expectsJson()) {
        return response()->json([
            'status' => 'success',
            'message' => 'Technician deleted successfully.'
        ]);
    }

    return redirect()->route('admin.technicians.index')
                     ->with('success', 'Technician deleted successfully.');
}
}
