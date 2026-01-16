<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>registration form</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

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
                
                
               

    @auth
    <a href="" class="login-btn">Profile</a>
    <form method="POST" action="">
        @csrf
        <button type="submit" class="login-btn">Logout</button>
    </form>
@else
    <a href="/hello" class="register-btn" style="text-decoration: none">Register</a>
@endauth



                <div class="mobile-menu-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Registration form</h2>
            </div>
            <div class="card-body">
                <form action="{{ url('/helo') }}" method="POST">
@csrf
 @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
  <div class="form-group">
    <label >Email address</label>
    <input type="email" name="email" class="form-control"  placeholder="Enter email">
  </div>
  <div class="form-group">
    <label >Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password">
  </div>
  <button type="submit" class="order-btn" style="text-decoration: none">Submit</button>
  
</form>
            </div>
        </div>
    </div>
</body>
</html>