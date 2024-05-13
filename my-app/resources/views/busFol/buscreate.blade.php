<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Bus Entry</title>
    <!-- Add CSS stylesheets or link to a CSS file here -->
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
        <h1>Create New Bus Entry</h1>

        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Bus creation form -->
        <form action="{{ route('busFol.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="bus_picture">Bus Picture URL:</label>
                <input type="text" id="bus_picture" name="bus_picture" class="form-control" required>
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
    </div>

    <!-- Add JavaScript scripts or link to a JS file here -->
</body>
</html>
