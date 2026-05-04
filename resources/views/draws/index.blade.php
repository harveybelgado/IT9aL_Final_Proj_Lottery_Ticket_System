@extends('layout')

@section('content')
    <div class="flex-between">
        <h2>Draws & History</h2>
        <a href="{{ route('draws.create') }}" class="btn btn-success">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            Schedule New Draw
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Draw Date</th>
                <th>Status</th>
                <th>Winning Numbers</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($draws as $draw)
                <tr>
                    <td style="font-weight: 600; color: var(--primary);">#{{ $draw->id }}</td>
                    <td>{{ $draw->draw_date->format('Y-m-d') }}</td>
                    <td>
                        @if($draw->is_completed)
                            <span style="background: #ecfdf5; color: #065f46; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.8rem; font-weight: 600;">
                                Completed
                            </span>
                        @else
                            <span style="background: #fffbeb; color: #92400e; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.8rem; font-weight: 600;">
                                Pending
                            </span>
                        @endif
                    </td>
                    <td>
                        @if($draw->winning_numbers)
                            <span style="font-family: monospace; background: #f1f5f9; padding: 0.2rem 0.5rem; border-radius: 4px; font-weight: 600;">
                                {{ $draw->winning_numbers }}
                            </span>
                        @else
                            <span style="color: var(--text-muted); font-style: italic;">To Be Determined</span>
                        @endif
                    </td>
                    <td>
                        @if(!$draw->is_completed)
                            <form action="{{ route('draws.conduct', $draw) }}" method="POST" style="margin:0;">
                                @csrf
                                <button type="submit" class="btn btn-primary" style="padding: 0.4rem 1rem; font-size: 0.85rem; background: #f59e0b;">
                                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="margin-right: 0.25rem;"><path d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Conduct Draw
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

