<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/AboutUs.css') }}" rel="stylesheet">
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
        @auth
            @if(Auth::user()->isAdmin())
                <form action="{{ route('admin.logout') }}" method="POST" class="form-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            @endif
        @endauth
    </nav>
    SUDARMADI
</body>
</html>