<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminClientController extends Controller
{
    /**
     * Display a listing of the clients.
     */
//   public function index(Request $request)
//     {
//         $keyword = $request->keyword; // matches form input name
    
//         $clients = User::where('role', 1)
//             ->when($keyword, function ($query, $keyword) {
//                 $query->where('name', 'like', "%{$keyword}%")
//                       ->orWhere('email', 'like', "%{$keyword}%")
//                       ->orWhere('phone', 'like', "%{$keyword}%")
//                       ->orWhere('company_name', 'like', "%{$keyword}%");
//             })
//             ->orderBy('id', 'desc')
//             ->paginate(10)
//             ->withQueryString();
    
//         $index = ($clients->currentPage() - 1) * $clients->perPage() + 1;
    
//         return view('admin.clients-management', compact('clients', 'index'));
//     }

public function index(Request $request)
{
    $keyword = $request->keyword;

    $clients = User::where('role', 1)
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

    $index = ($clients->currentPage() - 1) * $clients->perPage() + 1;

    return view('admin.clients-management', compact('clients', 'index'));
}

    /**
     * Store a newly created client in storage.
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
            'role' => 1, // Client
            'password' => Hash::make($data['password']),
        ]);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Client created successfully.', 'client' => $user], 201);
        }

        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified client.
     */
    public function show(User $client)
    {
        // Ensure requested user is a client
        if ($client->role != 1) {
            abort(404);
        }

        return view('admin.partials.client-view', compact('client'));
    }

    /**
     * Show the form for editing the specified client.
     */
    public function edit(User $client)
    {
        if ($client->role != 1) {
            abort(404);
        }

        return view('admin.partials.client-edit', compact('client'));
    }

    /**
     * Update the specified client in storage.
     */
    public function update(Request $request, User $client)
    {
        if ($client->role != 1) {
            abort(404);
        }

        $data = $request->only(['name', 'email', 'phone', 'company_name', 'status', 'password']);

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $client->id,
            'phone' => 'nullable|string|unique:users,phone,' . $client->id,
            'company_name' => 'nullable|string|max:255',
            'status' => 'nullable|in:0,1',
            'password' => 'nullable|string|min:6',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            return redirect()->back()->withErrors($validator)->withInput()->with('modal', 'editClientModal-' . $client->id);
        }

        $client->name = $data['name'];
        $client->email = $data['email'];
        $client->phone = $data['phone'] ?? null;
        $client->company_name = $data['company_name'] ?? null;
        $client->status = $data['status'] ?? 1;

        if (!empty($data['password'])) {
            $client->password = Hash::make($data['password']);
        }

        $client->save();

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Client updated successfully.', 'client' => $client], 200);
        }

        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully.');
    }

    
    public function destroy($id)
    {
        $client = User::findOrFail($id);
        $client->delete();
    
        if (request()->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Client deleted successfully.'
            ]);
        }
    
        return redirect()->route('admin.clients.index')
                         ->with('success', 'Client deleted successfully.');
    }






}
