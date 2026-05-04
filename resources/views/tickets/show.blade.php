@extends('layout')

@section('content')
    <h2>Ticket Details</h2>
    <div style="background:#fff; padding:2rem; border:1px solid #ddd; border-radius:5px;">
        <p><strong>Ticket ID:</strong> {{ $ticket->id }}</p>
        <p><strong>Owner:</strong> {{ $ticket->user->name }}</p>
        <p><strong>Draw Date:</strong> {{ $ticket->draw->draw_date->format('Y-m-d') }}</p>
        <p><strong>Chosen Numbers:</strong> {{ $ticket->numbers }}</p>

        <hr>

        @if($ticket->draw->is_completed)
            <p><strong>Winning Numbers:</strong> {{ $ticket->draw->winning_numbers }}</p>
            <p><strong>Status:</strong> 
                @if($ticket->is_winner)
                    <span style="color:green; font-weight:bold;">WINNER</span>
                @else
                    <span>Not a winning ticket</span>
                @endif
            </p>
            
            @if($ticket->is_winner)
                <p><strong>Claim Status:</strong> {{ $ticket->is_claimed ? 'Claimed' : 'Not Claimed' }}</p>
                @if(!$ticket->is_claimed)
                    <form action="{{ route('claims.store', $ticket) }}" method="POST">
                        @csrf
                        <button type="submit" style="background:#28a745;">Claim Prize Now</button>
                    </form>
                @endif
            @endif
        @else
            <p><strong>Status:</strong> Awaiting Draw</p>
        @endif
    </div>
    <br>
    <a href="{{ route('tickets.index') }}">Back to list</a>
@endsection
