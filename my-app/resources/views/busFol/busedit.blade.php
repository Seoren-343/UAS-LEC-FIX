<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('css/BusEdit.css') }}" rel="stylesheet">

</head>
<body>
        <nav class="navbar">
        <a class="navbar-brand" href="#">Your Website</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('founders') }}">Founder</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('category-bus') }}">Category Bus</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('galleries') }}">Gallery</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('aboutUs') }}">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('contacts') }}">Contact</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Edit Bus</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('busFol.update', $bus->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="current_bus_picture">Current Bus Picture:</label>
                <div>
                    <img src="{{ asset($bus->bus_picture) }}" alt="{{ $bus->bus_type }}" class="img-thumbnail" width="200">
                </div>
            </div>
            <div class="form-group">
                <label for="additional_images">Add Additional Images:</label>
                <input type="file" id="additional_images" name="additional_images[]" class="form-control-file" multiple>
            </div>
            <div class="form-group">
                <label for="bus_type">Bus Type:</label>
                <input type="text" id="bus_type" name="bus_type" class="form-control" value="{{ $bus->bus_type }}" required>
            </div>
            <div class="form-group">
                <label for="specs">Specifications:</label>
                <textarea id="specs" name="specs" class="form-control" rows="5" required>{{ $bus->specs }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Bus</button>
        </form>        
    </div>
</body>
</html>

