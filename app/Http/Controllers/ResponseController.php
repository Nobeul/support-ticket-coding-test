<?php

namespace App\Http\Controllers;

use App\Mail\TicketMail;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ResponseController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('status', 'open')->get();
        return view('admin.tickets.index', compact('tickets'));
    }
    
    public function store(Request $request, Ticket $ticket)
    {
        $request->validate(['message' => 'required']);
    
        $ticket->responses()->create([
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);
    
        return redirect()->route('tickets.show', $ticket);
    }
    
    public function close(Ticket $ticket)
    {
        $ticket->update(['status' => 'closed']);
    
        Mail::to($ticket->user->email)->send(new TicketMail($ticket, 'closed'));
    
        return redirect()->route('home');
    }
    
}
