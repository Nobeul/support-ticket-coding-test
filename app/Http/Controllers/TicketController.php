<?php

namespace App\Http\Controllers;

use App\Mail\TicketMail;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function create()
    {
        return view('tickets.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);
    
        $ticket = auth()->user()->tickets()->create($request->except('_token'));
    
        Mail::to('admin@example.com')->send(new TicketMail($ticket, 'created'));
    
        return redirect()->route('home');
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        
        return view('tickets.show', compact('ticket'));
    }
}
