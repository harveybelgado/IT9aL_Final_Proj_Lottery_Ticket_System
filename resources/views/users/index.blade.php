@extends('layout')

@section('content')
    <div class="flex-between">
        <h2>System Users</h2>
        <a href="{{ route('users.create') }}" class="btn btn-success">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            Add New User
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td style="font-weight: 600; color: var(--primary);">#{{ $user->id }}</td>
                    <td style="font-weight: 500;">{{ $user->name }}</td>
                    <td style="color: var(--text-muted);">{{ $user->email }}</td>
                    <td>
                        <span class="role-badge" style="margin: 0; 
                            {{ $user->role === 'admin' ? 'background: rgba(239, 68, 68, 0.1); color: #ef4444; border-color: rgba(239, 68, 68, 0.2);' : '' }}
                            {{ $user->role === 'staff' ? 'background: rgba(16, 185, 129, 0.1); color: #10b981; border-color: rgba(16, 185, 129, 0.2);' : '' }}
                            {{ $user->role === 'customer' ? 'background: rgba(99, 102, 241, 0.1); color: #6366f1; border-color: rgba(99, 102, 241, 0.2);' : '' }}
                        ">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td>
                        @if(auth()->user()->role === 'admin')
                            <div style="display: flex; gap: 0.75rem; align-items: center;">
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-outline" style="padding: 0.25rem 0.75rem; font-size: 0.85rem;">Edit</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" style="padding: 0; background: transparent; color: #ef4444; font-size: 0.85rem; text-decoration: underline;">Delete</button>
                                </form>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

