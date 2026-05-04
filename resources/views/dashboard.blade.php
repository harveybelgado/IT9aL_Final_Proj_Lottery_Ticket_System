@extends('layout')

@section('content')
    <div class="flex-between">
        <div>
            <h2>Dashboard</h2>
            <p style="color: var(--text-muted)">Welcome back, <strong style="color: var(--text)">{{ $user->name }}</strong>. Here's what's happening today.</p>
        </div>
    </div>

    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; margin-top: 2rem;">
        @if($user->role === 'admin')
            <div class="card">
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                    <div style="background: #eff6ff; color: var(--primary); padding: 0.5rem; border-radius: 8px;">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 style="margin: 0;">Admin Control</h3>
                </div>
                <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 1.5rem;">Manage platform users and oversee system operations.</p>
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <a href="{{ route('users.index') }}" class="btn btn-outline">Manage Users</a>
                    <a href="{{ route('draws.index') }}" class="btn btn-outline">Lotto Draws & History</a>
                    <a href="{{ route('tickets.index') }}" class="btn btn-outline">Audit Tickets</a>
                </div>
            </div>
        @endif

        @if($user->role === 'staff')
            <div class="card">
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                    <div style="background: #ecfdf5; color: #10b981; padding: 0.5rem; border-radius: 8px;">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                    <h3 style="margin: 0;">Staff Operations</h3>
                </div>
                <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 1.5rem;">Process customer registrations and ticket purchases.</p>
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <a href="{{ route('users.create') }}" class="btn btn-outline">Register New Customer</a>
                    <a href="{{ route('tickets.create') }}" class="btn btn-outline">Process Ticket Purchase</a>
                    <a href="{{ route('tickets.index') }}" class="btn btn-outline">Claims & Ticket Status</a>
                </div>
            </div>
        @endif

        @if($user->role === 'customer')
            <div class="card">
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                    <div style="background: #fffbeb; color: #f59e0b; padding: 0.5rem; border-radius: 8px;">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                    </div>
                    <h3 style="margin: 0;">My Account</h3>
                </div>
                <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 1.5rem;">Participate in draws and track your winning tickets.</p>
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <a href="{{ route('tickets.create') }}" class="btn btn-primary">Buy Lotto Ticket</a>
                    <a href="{{ route('tickets.index') }}" class="btn btn-outline">My Tickets & Results</a>
                </div>
            </div>
        @endif
    </div>
@endsection

