<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});

Route::get('/add', function () {
    return view('admin');
});

Route::view('/helo', 'login');
// Show form
Route::get('/hello', function () {
    return view('registration');
});

// Handle form submission
// Route::post('/hello', [UserController::class, 'store']);
// Route::post('/helo', [UserController::class, 'login']); 

// User login
Route::get('/helo', [AuthController::class, 'showUserLogin'])->name('user.login.form');
Route::post('/helo', [AuthController::class, 'userLogin'])->name('user.login');

// Admin login routes
Route::get('/admin/log', [AuthController::class, 'showAdminLogin'])->name('admin.login.form');
Route::post('/admin/log', [AuthController::class, 'adminLogin'])->name('admin.login');


Route::post('/logout', function () {
    session()->forget('user');  // remove user data
    return redirect('/');       // go back to home page
});



Route::get('/', [PostController::class, 'home']);
Route::post('/addpost', [PostController::class, 'store'])->name('addpost');

Route::post('/logout', function () {
    Auth::logout(); // Logs the user out
    session()->invalidate(); // Clears the session
    session()->regenerateToken(); // Protects from CSRF
    return redirect('/')->with('success', 'You have been logged out successfully.');
});


Route::get('/admin/users', function () {
    return view('admin.users');
});

// Route::get('/admin/users', [AuthController::class, 'manageUsers']);
Route::get('/admin/users', [AuthController::class, 'manageUsers'])
    ->middleware('auth')
    ->name('admin.users');

Route::get('/admin/posts', [PostController::class, 'allPosts'])->name('admin.posts');


Route::get('admin', [UserController::class, 'index'])->name('admin.index');
Route::delete('admin/{id}', [UserController::class, 'destroy'])->name('admin.destroy');

Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// Handle update
Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('users.update');