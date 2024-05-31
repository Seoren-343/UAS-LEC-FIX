<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Contact</title>
    <link href="{{ asset('css/CreateContact.css') }}" rel="stylesheet">
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
        <h1>Create Contact</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contactFol.contactstore') }}" method="POST">
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
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
                <h3>ADDRESS</h3>
                <p>Jalan Cipayung Raya, Cipayung, Jakarta Timur</p>
                <p>13840 (Depan SMA 4 PGRI)</p>
            </div>
            <div class="footer-column">
                <h3>PHONE</h3>
                <p>Contact Office</p>
                <p>0813-1127-7272</p>
                <p>021-7496562</p>
                <p>021-7490311</p>
                <p>Fax: 021-7419242</p>
            </div>
            <div class="footer-column">
                <h3>EMAIL</h3>
                <p>bisichtrahaya@gmail.com</p>
            </div>
            <div class="footer-column">
                <h3>COMPANY</h3>
                <a href="{{ url('founders') }}">Founder</a>
                <a href="{{ url('galleries') }}">Gallery</a>
                <a href="{{ url('aboutUs') }}">About Us</a>
                <a href="{{ url('contacts') }}">Contact</a>
            </div>
        </div>
    </footer>
</body>
</html>