<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Draw;
use App\Models\Ticket;

class DrawController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') abort(403);
        $draws = Draw::orderBy('draw_date', 'desc')->get();
        return view('draws.index', compact('draws'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') abort(403);
        return view('draws.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') abort(403);
        
        $request->validate([
            'draw_date' => 'required|date',
        ]);

        Draw::create([
            'draw_date' => $request->draw_date,
        ]);

        return redirect()->route('draws.index')->with('success', 'Draw scheduled.');
    }

    public function conduct(Draw $draw)
    {
        if (auth()->user()->role !== 'admin') abort(403);
        if ($draw->is_completed) {
            return back()->withErrors('Draw is already completed.');
        }

        // Generate winning numbers
        $numbers = [];
        while(count($numbers) < 6) {
            $num = rand(1, 42);
            if (!in_array($num, $numbers)) {
                $numbers[] = $num;
            }
        }
        sort($numbers);
        $winningNumbers = implode(',', $numbers);

        $draw->update([
            'winning_numbers' => $winningNumbers,
            'is_completed' => true,
        ]);

        // Evaluate tickets
        $tickets = Ticket::where('draw_id', $draw->id)->get();
        foreach ($tickets as $ticket) {
            if ($ticket->numbers === $winningNumbers) {
                $ticket->update(['is_winner' => true]);
            }
        }

        return redirect()->route('draws.index')->with('success', "Draw conducted! Winning numbers: $winningNumbers");
    }
}
