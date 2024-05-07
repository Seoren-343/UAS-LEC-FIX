<!-- resources/views/category/bus.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Bus</title>
    <!-- Add CSS stylesheets or link to a CSS file here -->
    <style>
        /* Add your CSS styles here */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .card img {
            width: 100%;
            height: auto;
        }
        .card-body {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Category Bus</h1>

        @foreach ($buses as $bus)
            <div class="card">
                <img src="{{ $bus->bus_picture }}" alt="{{ $bus->bus_type }}">

                <div class="card-body">
                    <h3>{{ $bus->bus_type }}</h3>
                    <p>{{ $bus->specs }}</p>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
