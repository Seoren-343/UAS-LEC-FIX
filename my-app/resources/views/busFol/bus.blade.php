<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Bus</title>
    <link href="{{ asset('css/bus.css') }}" rel="stylesheet">
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
            display: none;
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
    <nav class="navbar">
        <a class="navbar-brand" href="#">Your Website</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('founders') }}">Founder</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('category-bus') }}">Category Bus</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('aboutUs') }}">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('contacts') }}">Contact</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Category Bus</h1>
        @auth
            @if(Auth::user()->isAdmin())
                <div class="navbar-admin">
                    <a class="btn btn-success" href="{{ route('busFol.buscreate') }}">Add Bus</a>
                </div>
            @endif
        @endauth
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary" onclick="filterBuses('big bus')">Big Bus</button>
            <button type="button" class="btn btn-primary" onclick="filterBuses('medium bus')">Medium Bus</button>
            <button type="button" class="btn btn-primary" onclick="filterBuses('small bus')">Small Bus</button>
        </div>
        @foreach ($buses as $bus)
            <div class="card mt-4" id="bus{{ $bus->id }}">
                <div class="card-body">
                    <a href="{{ route('busFol.busshow', ['id' => $bus->id]) }}">
                        <img src="{{ asset($bus->bus_picture) }}" alt="{{ $bus->bus_type }}" class="img-thumbnail" width="200">
                    </a>
                    <a href="{{ route('busFol.busshow', ['id' => $bus->id]) }}">
                        <h3>{{ $bus->bus_type }}</h3>
                    </a>
                    <p>{{ $bus->specs }}</p>
                    @auth
                        @if(Auth::user()->isAdmin())
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{ route('busFol.busedit', ['id' => $bus->id]) }}">Edit Bus</a>
                                <form action="{{ route('busFol.delete', ['id' => $bus->id]) }}" method="POST" id="delete-form-{{ $bus->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this bus?')">Delete Bus</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
    <script>
        function filterBuses(busType) {
            const buses = document.querySelectorAll('.card');
            buses.forEach(bus => {
                if (bus.querySelector('img').alt === busType) {
                    bus.style.display = 'block';
                } else {
                    bus.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
