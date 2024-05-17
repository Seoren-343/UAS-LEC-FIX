<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Details</title>
    <link href="{{ asset('css/BusDetails.css') }}" rel="stylesheet">
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
