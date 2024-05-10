<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing Contact</title>
</head>
<body>
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
        <h1>Create Contact</h1>

        <!-- Display validation errors if any -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="office_num">Office Number</label>
                <input type="text" name="office_num" class="form-control" value="{{ old('office_num') }}">
            </div>
            <div class="form-group">
                <label for="fax">Fax</label>
                <input type="text" name="fax" class="form-control" value="{{ old('fax') }}">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" value="{{ old('location') }}">
            </div>
            <button type="submit" class="btn btn-primary">Create Contact</button>
        </form>
    </div>
    </body>
</html>