<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Your Website</title>
    <!-- Add CSS stylesheets or link to a CSS file here -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            position: relative;
        }

        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .navbar-brand {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar-nav {
            display: flex;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .nav-item {
            margin-right: 10px;
        }

        .nav-link {
            color: #fff;
            text-decoration: none;
        }

        .navbar-auth {
            margin-left: 10px;
        }

        .container {
            padding: 20px;
        }

        .maincontent {
            margin-top: 50px;
        }

        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Founder</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('category-bus') }}">Category Bus</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('contacts') }}">Contact</a></li>
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
    </nav>

    <!-- Page content -->
    <div class="container">
        <div class="maincontent">
            <h1>Welcome to Your Website</h1>
        </div>
        <!-- Add more content here -->
    </div>

    <!-- Add JavaScript scripts or link to a JS file here -->
</body>
</html>
