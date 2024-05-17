<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Bus Entry</title>
    <link href="{{ asset('css/createbus.css') }}" rel="stylesheet">
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
        <h1>Create New Bus Entry</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('bus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="bus_picture">Bus Picture:</label>
                <input type="file" id="bus_picture" name="bus_picture" class="form-control-file" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="bus_type">Bus Type:</label>
                <select id="bus_type" name="bus_type" class="form-control" required>
                    <option value="big bus">Big Bus</option>
                    <option value="medium bus">Medium Bus</option>
                    <option value="small bus">Small Bus</option>
                </select>
            </div>
            <div class="form-group">
                <label for="specs">Specifications:</label>
                <textarea id="specs" name="specs" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Bus</button>
        </form>
</body>
</html>
