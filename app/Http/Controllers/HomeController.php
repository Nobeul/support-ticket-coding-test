<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole('Admin')) {
            $tickets = Ticket::latest()->paginate(25);
        } else {
            $tickets = auth()->user()->tickets()->latest()->paginate(25);
        }

        return view('tickets.index', compact('tickets'));
    }
}
