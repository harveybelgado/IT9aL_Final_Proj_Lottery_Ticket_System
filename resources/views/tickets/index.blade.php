@extends('layout')

@section('content')
    <div class="flex-between">
        <h2>Tickets</h2>
        <a href="{{ route('tickets.create') }}" class="btn btn-success">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"></path></svg>
            Buy Ticket
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Ticket ID</th>
                <th>Draw Date</th>
                <th>Numbers</th>
                <th>Status</th>
                @if(auth()->user()->role !== 'customer')
                    <th>User</th>
                @endif
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td style="font-weight: 600; color: var(--primary);">#{{ $ticket->id }}</td>
                    <td>{{ $ticket->draw->draw_date->format('Y-m-d') }}</td>
                    <td>
                        <span style="font-family: monospace; background: #f1f5f9; padding: 0.2rem 0.5rem; border-radius: 4px; font-weight: 600;">
                            {{ $ticket->numbers }}
                        </span>
                    </td>
                    <td>
                        @if(!$ticket->draw->is_completed)
                            <span style="color: var(--text-muted)">Pending Draw</span>
                        @elseif($ticket->is_winner)
                            <span style="color: #10b981; font-weight: 600; display: flex; align-items: center; gap: 0.25rem;">
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd"></path></svg>
                                Winner!
                            </span>
                            @if($ticket->is_claimed)
                                <span style="font-size: 0.8rem; color: var(--text-muted)">(Claimed)</span>
                            @endif
                        @else
                            <span style="color: var(--text-muted)">No luck</span>
                        @endif
                    </td>
                    @if(auth()->user()->role !== 'customer')
                        <td>{{ $ticket->user->name }}</td>
                    @endif
                    <td>
                        <div style="display: flex; gap: 0.5rem; align-items: center;">
                            <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-outline" style="padding: 0.25rem 0.75rem; font-size: 0.85rem;">View</a>
                            @if($ticket->draw->is_completed && $ticket->is_winner && !$ticket->is_claimed)
                                <form action="{{ route('claims.store', $ticket) }}" method="POST" style="margin:0;">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" style="padding: 0.25rem 0.75rem; font-size: 0.85rem;">Claim Prize</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

