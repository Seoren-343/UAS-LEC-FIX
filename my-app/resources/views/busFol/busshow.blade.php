<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Details</title>
    <link href="{{ asset('css/BusDetails.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #a6a6a6;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
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

        .container {
            max-width: 1200px;
            margin: 50px auto 20px;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .card {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            display: none; /* Initially hide all cards */
        }

        .card img {
            max-width: 200px;
        }

        .btn-group {
            margin-top: 10px;
        }

        .btn-group button,
        .btn-group a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a class="navbar-brand" href="#">Your Website</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
            <!-- Add other navbar items as needed -->
        </ul>
    </nav>

    <div class="container">
        <h1>Bus Details</h1>
        <img src="{{ asset($bus->bus_picture) }}" alt="{{ $bus->bus_type }}" class="img-thumbnail" width="200">
        <h3>{{ $bus->bus_type }}</h3>
        <p>{{ $bus->specs }}</p>
        <!-- You can add more bus details here -->
    </div>

    <!-- Add JavaScript scripts or link to a JS file here -->
</body>
</html>
