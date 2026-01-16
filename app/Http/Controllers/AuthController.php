<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Register;
use App\Models\User;

class AuthController extends Controller
{
    // Show user login page
    public function showUserLogin()
    {
        return view('auth.user_login'); // make sure this file exists
    }

    // Show admin login page
    public function showAdminLogin()
    {
        return view('auth.admin_login'); // make sure this file exists
    }

    // USER LOGIN (POST)
    public function userLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
    $user = Auth::user();
    session(['user' => $user]); // store in session

    if ($user->role === 'admin') {
        return redirect('/')->with('success', 'Welcome Admin!');
    } else {
        return redirect('/')->with('success', 'Welcome back, user!');
    }
}

        return back()->with('error', 'Invalid email or password.');
    }

    // ADMIN LOGIN (POST)
    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect('/')->with('success', 'Welcome Admin!');
            } else {
                Auth::logout();
                return back()->with('error', 'Only admins can access this portal.');
            }
        }

        return back()->with('error', 'Invalid email or password.');
    }

    public function manageUsers()
{
    $users = Register::all();
    return view('admin.users', compact('users'));
}

    
}
