@extends('layout')

@section('content')
    <h2>Login</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="email" value="admin@example.com" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" value="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Log In</button>
    </form>
    
    <p>Test credentials seeded:</p>
    <ul>
        <li>admin@example.com / password</li>
        <li>staff@example.com / password</li>
        <li>customer@example.com / password</li>
    </ul>
@endsection
