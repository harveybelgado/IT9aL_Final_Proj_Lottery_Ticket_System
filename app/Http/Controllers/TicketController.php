<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ticket;
use App\Models\Draw;

class TicketController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->role === 'admin' || $user->role === 'staff') {
            $tickets = Ticket::with('user', 'draw')->get();
        } else {
            $tickets = Ticket::with('draw')->where('user_id', $user->id)->get();
        }
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $activeDraw = Draw::where('is_completed', false)->first();
        return view('tickets.create', compact('activeDraw'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'draw_id' => 'required|exists:draws,id',
            'numbers' => 'required|string',
        ]);

        Ticket::create([
            'user_id' => auth()->id(),
            'draw_id' => $request->draw_id,
            'numbers' => $request->numbers,
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket purchased successfully.');
    }

    public function generate()
    {
        // Simple random generation of 6 numbers between 1 and 42
        $numbers = [];
        while(count($numbers) < 6) {
            $num = rand(1, 42);
            if (!in_array($num, $numbers)) {
                $numbers[] = $num;
            }
        }
        sort($numbers);
        return response()->json(['numbers' => implode(',', $numbers)]);
    }

    public function show(Ticket $ticket)
    {
        $user = auth()->user();
        if ($user->role === 'customer' && $ticket->user_id !== $user->id) {
            abort(403);
        }
        return view('tickets.show', compact('ticket'));
    }
}
