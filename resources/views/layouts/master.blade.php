<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tasks</title>
<link rel="stylesheet" href="style.css">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('tasks.index') }}">Posts</a>
    </div>
    <div class="nav navbar-nav navbar-right">
        <li><a href="{{ route('home') }}">Home</a></li>
        <!-- <li><a href="{{ route('tasks.index') }}">Posts</a></li> -->

        @if(Auth::guest())
         <!-- <li> <a href="/auth/login" class ="btn btn-primary">Login</a></li> -->
              <li class = "dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="/auth/login">Login</a></li>
                  <li><a href="/auth/register">Signup</a></li>
                </ul>
              </li>
        @endif

         @if(Auth::check())
          <li><a href="/profile">Welcome, {{ Auth::user()->name }}</a></li>
          <li><a href="/auth/logout" class ="btn btn-danger">Logout</a></li>
        @endif

    </div>
  </div>
</nav>


<main>
            
      <style>@yield('style')</style>

      <div class="container">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        
        @yield('content')
    </div>
</main>



</body>
</html>