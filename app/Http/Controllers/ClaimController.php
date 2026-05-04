<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ticket;

class ClaimController extends Controller
{
    public function claim(Ticket $ticket)
    {
        $user = auth()->user();
        if ($user->role === 'customer' && $ticket->user_id !== $user->id) {
            abort(403);
        }

        if (!$ticket->is_winner) {
            return back()->withErrors('This ticket is not a winning ticket.');
        }

        if ($ticket->is_claimed) {
            return back()->withErrors('This ticket has already been claimed.');
        }

        $ticket->update(['is_claimed' => true]);

        return back()->with('success', 'Prize claimed successfully!');
    }
}
