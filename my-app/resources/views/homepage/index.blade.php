<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Your Website</title>
    <!-- Add CSS stylesheets or link to a CSS file here -->
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand">Your Website</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Founder</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('category-bus') }}">Category Bus</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Destination</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>
            <div class="navbar-auth">
                @guest
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Signup</a>
                @else
                    <!-- Display user name or dropdown menu for logged-in users -->
                    <span>Hello, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Page content -->
    <div class="container">
        <h1>Welcome to Your Website</h1>
        <!-- Add more content here -->
    </div>

    <!-- Add JavaScript scripts or link to a JS file here -->
</body>
</html>

