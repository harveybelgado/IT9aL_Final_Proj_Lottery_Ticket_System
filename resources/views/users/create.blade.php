@extends('layout')

@section('content')
    <h2>Create User / Register Customer</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label>Role</label>
            <select name="role" required>
                @if(auth()->user()->role === 'admin')
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                @endif
                <option value="customer" selected>Customer</option>
            </select>
        </div>
        <button type="submit">Save</button>
    </form>
@endsection
