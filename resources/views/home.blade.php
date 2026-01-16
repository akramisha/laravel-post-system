<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
.post-card {
    transition: all 0.3s ease;
}
.post-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
</style>

</head>
  <body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>Golden<span>Bite</span></h1>
            </div>
           <nav>
    <ul class="nav-links">
        <li><a href="{{ url('/') }}" class="active" style="text-decoration: none">Dashboard</a></li>
       
    </ul>
</nav>

            <div class="header-right">
                
                
               
 @if(Auth::check())
    @php $loggedUser = Auth::user(); @endphp

    @if($loggedUser->role === 'admin')
        <a href="{{ url('/admin/users') }}" class="order-btn" style="text-decoration: none">Manage Users</a>
        <a href="{{ url('/admin/posts') }}" class="login-btn" style="text-decoration: none">All Posts</a>
        <a href="#" class="login-btn" style="text-decoration: none">Profile</a>
        <form method="POST" action="{{ url('/logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="login-btn" onclick="return confirmLogout()">Logout</button>
        </form>
    @else
        <a href="#" class="login-btn">Profile</a>
        <form method="POST" action="{{ url('/logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="login-btn" onclick="return confirmLogout()">Logout</button>
        </form>
    @endif
@else
    <a href="{{ url('/admin/log') }}" class="order-btn" style="text-decoration: none">Admin</a>
    <a href="{{ url('/helo') }}" class="login-btn" style="text-decoration: none">User</a>
    <a href="{{ url('/hello') }}" class="register-btn" style="text-decoration: none">Register</a>
@endif

<script>
function confirmLogout() {
    return confirm('Are you sure you want to log out?');
}
</script>






                <div class="mobile-menu-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>
   
    <section >
       
                     @if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif 

@if(Auth::check())
    @php
        $loggedUser = Auth::user();
    @endphp
    <h3 style="text-align: center">
        Welcome, {{ $loggedUser->name }}!
        @if($loggedUser->role === 'admin')
            (Admin)
        @endif
    </h3>
@else
    <h3 style="text-align: center">Welcome, Guest!</h3>
@endif


@if(Auth::check())
    @php
        $loggedUser = Auth::user();
    @endphp
    <h3 >

         <div class="container mt-5">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Post form</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/addpost') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label >Title</label>
                                <input type="text" name="title" class="form-control"  placeholder="title">
                            </div>
                            <div class="form-group">
                                <label >Subject</label>
                                <input type="text" name="subject" class="form-control"  placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <label >Description</label>
                                <textarea name="description" id="" cols="30" rows="10"></textarea>
                            </div>

                            <button type="submit" class="order-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
    </h3>
@else
    <p style="text-align: center">
        Please login to create a post.
    </p>
@endif
           



@if(Auth::check())
    @php
        $loggedUser = Auth::user();
    @endphp

<div class="post-container" 
     style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-top: 30px;">

    @foreach($posts as $index => $post)
        <div class="post-card" 
             style="border: 1px solid #ddd; border-radius: 10px; padding: 15px; background: #f9f9f9;">

            <h4 style="color: #555;"> Post {{ $index + 1 }}</h4>
            <h3 style="margin-bottom: 5px;">{{ $post->title }}</h3>
            <p><strong>Subject:</strong> {{ $post->subject }}</p>
            <p style="margin-top: 5px;">{{ $post->description }}</p>
            <small style="color: gray;">Posted on {{ $post->created_at->format('d M Y, h:i A') }}</small>
        </div>
    @endforeach

    
@else
        <p style="text-align: center; margin-top: 30px;">
        Please login to view posts.
    </p>
@endif
</div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>