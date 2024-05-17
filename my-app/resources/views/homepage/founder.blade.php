<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Founder</title>
    <link href="{{ asset('css/Founder.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('founders') }}">Founder</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('category-bus') }}">Category Bus</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('aboutUs') }}">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('contacts') }}">Contact</a></li>
        </ul>
        <div class="navbar-auth">
            @guest
                <a class="nav-link" href="{{ route('login') }}">Login</a>
                <a class="nav-link" href="{{ route('register') }}">Signup</a>
            @else
                <span>Hello, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endguest
        </div>
    </nav>
</body>
</html>