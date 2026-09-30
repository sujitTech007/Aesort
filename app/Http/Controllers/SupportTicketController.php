<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportTicketController extends Controller
{
    public function index()
    {
        $tickets = SupportTicket::with(['user', 'site'])->orderByDesc('created_at')->paginate(20);

        return view('admin.support-tickets', compact('tickets'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'site_id' => 'nullable|exists:sites,id',
        ]);

        SupportTicket::create([
            'user_id' => Auth::id(),
            'site_id' => $data['site_id'] ?? null,
            'subject' => $data['subject'],
            'description' => $data['description'],
            'status' => 'open',
        ]);

        return back()->with('success', 'Support ticket submitted successfully.');
    }
}
