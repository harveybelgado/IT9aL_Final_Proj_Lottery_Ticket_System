<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') abort(403);
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        if (!in_array(auth()->user()->role, ['admin', 'staff'])) abort(403);
        return view('users.create');
    }

    public function store(Request $request)
    {
        if (!in_array(auth()->user()->role, ['admin', 'staff'])) abort(403);
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,staff,customer',
        ]);

        if (auth()->user()->role === 'staff' && $data['role'] !== 'customer') {
            abort(403, 'Staff can only register customers.');
        }

        $data['password'] = bcrypt($data['password']);
        User::create($data);

        $redirect = auth()->user()->role === 'admin' ? 'users.index' : 'dashboard';
        return redirect()->route($redirect)->with('success', 'User created.');
    }

    public function edit(User $user)
    {
        if (auth()->user()->role !== 'admin') abort(403);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (auth()->user()->role !== 'admin') abort(403);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,staff,customer',
        ]);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);
        return redirect()->route('users.index')->with('success', 'User updated.');
    }

    public function destroy(User $user)
    {
        if (auth()->user()->role !== 'admin') abort(403);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted.');
    }
}
