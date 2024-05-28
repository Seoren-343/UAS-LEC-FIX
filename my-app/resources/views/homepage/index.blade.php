<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Website</title>
    <link href="{{ asset('css/Home.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('founders') }}">Founder</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('category-bus') }}">Category Bus</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('gallery') }}">Gallery</a></li>
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
    <div class="container">
        <div class="maincontent">
            <h1>Welcome to Our Website</h1>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-container">
            <p><strong>Address:</strong> 1234 Street Name, City, Country</p>
            <p><strong>Phone:</strong> (123) 456-7890</p>
            <p><strong>Email:</strong> info@company.com</p>
            <p><strong>Company:</strong> Your Company Name</p>
        </div>
    </footer>
</body>
</html>