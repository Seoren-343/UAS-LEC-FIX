<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Bus</title>
    <!-- Add CSS stylesheets or link to a CSS file here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
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
            margin: 50px auto 20px; /* Added margin-top for content */
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a class="navbar-brand" href="#">Your Website</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Founder</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('category-bus') }}">Category Bus</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('contacts') }}">Contact</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Category Bus</h1>
        <!-- Bus type filter buttons -->
        @auth
            @if(Auth::user()->isAdmin())
                <!-- Admin actions -->
                <div class="navbar-admin">
                    <a class="btn btn-primary" href="{{ url('busFol.buscreate') }}">Add Bus</a>
                    <a class="btn btn-primary" href="{{ url('busFol.busedit') }}">Edit Bus</a>
                    <!-- <a class="nav-link" href="{{ url('bus/delete') }}">Delete Bus</a> -->
                </div>
            @endif
        @endauth
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary" onclick="filterBuses('big')">Big Bus</button>
            <button type="button" class="btn btn-primary" onclick="filterBuses('medium')">Medium Bus</button>
            <button type="button" class="btn btn-primary" onclick="filterBuses('small')">Small Bus</button>
        </div>

        @foreach ($buses as $bus)
            <div class="card" id="bus{{ $bus->id }}" style="display: none;">
                <img src="{{ $bus->bus_picture }}" alt="{{ $bus->bus_type }}">
                <div class="card-body">
                    <h3>{{ $bus->bus_type }}</h3>
                    <p>{{ $bus->specs }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function filterBuses(busType) {
            const buses = document.querySelectorAll('.card');
            buses.forEach(bus => {
                bus.style.display = 'none';
            });

            const selectedBuses = document.querySelectorAll(`#bus${busType}`);
            selectedBuses.forEach(bus => {
                bus.style.display = 'block';
            });
        }
    </script>
</body>
</html>
