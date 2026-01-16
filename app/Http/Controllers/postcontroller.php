<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Show homepage with posts of the logged-in user only
    public function index()
{
    $user = session('user'); // using session-based login

    if ($user) {
        // Fetch only posts created by that user, with user relationship
        $posts = Post::with('user')
                     ->where('user_id', $user->id)
                     ->orderBy('created_at', 'desc')
                     ->get();
    } else {
        $posts = collect(); // empty collection
    }

    return view('home', compact('posts'));
}

    // Store new post created by logged-in user
    public function store(Request $request)
    {
        $user = session('user');

        if (!$user) {
            return redirect('/helo')->with('error', 'Please login first.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Save post in database with user_id
        Post::create([
            'user_id' => $user->id,
            'title' => $validated['title'],
            'subject' => $validated['subject'],
            'description' => $validated['description'],
        ]);

        return redirect('/')->with('success', 'Post created successfully!');
    }

    // Optional: You can use this if your route calls 'home' instead of 'index'
    public function home()
    {
        $user = session('user');

        if ($user) {
            $posts = Post::where('user_id', $user->id)
                        ->orderBy('created_at', 'desc')
                        ->get();
        } else {
            $posts = collect();
        }

        return view('home', compact('posts'));
    }

    public function allPosts()
{
    // Fetch all posts, with user relationship for usernames
    $posts = Post::with('user')->orderBy('created_at')->get();
    return view('admin.posts', compact('posts'));
}
public function user()
{
    return $this->belongsTo(Register::class, 'user_id');
}



}
