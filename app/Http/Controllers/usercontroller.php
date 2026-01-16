<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //register function
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed|max:20',
        ]);

        Register::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/helo')->with('success', 'Registration successful! Please login.');
    }

    //login function
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find user by email
        $user = Register::where('email', $request->email)->first();

        // If user exists and password matches
        if ($user && Hash::check($request->password, $user->password)) {
            // Store user info in session
            session(['user' => $user]);
            
            return redirect('/')->with('success', 'Welcome back, '.$user->name.'!');
        }

        // If credentials are wrong
        return back()->with('error', 'Invalid email or password.');
    }

    //user destroy function
    public function index()
    {
        $users = Register::all();
        return view('admin.users', compact('users'));
    }

    // Delete user
    public function destroy($id)
    {
        $user = Register::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.index')->with('success', 'User deleted successfully!');
    }

     public function edit(Register $user)
    {
        return view('admin.edit_user', compact('user'));
    }

    // Handle update
    public function update(Request $request, Register $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string|in:user,admin',
        ]);

        $user->update($validated);

        return redirect()->route('admin.users', $user->id)
                         ->with('success', 'User updated successfully!');
    }
}

