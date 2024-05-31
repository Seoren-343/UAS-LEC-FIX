<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link href="{{ asset('css/Gallery.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
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
        <h1>Gallery</h1>
        <div class="image-gallery">
            @foreach ($buses as $bus)
                <div class="gallery-item">
                    <img src="{{ asset($bus->bus_picture) }}" alt="{{ $bus->bus_type }}" class="img-thumbnail">
                    @foreach ($bus->additionalImages as $image)
                        <img src="{{ asset($image->image_path) }}" alt="{{ $bus->bus_type }}" class="img-thumbnail">
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
                <h3>ADDRESS</h3>
                <p>Jl. Moh. Toha No.30B, Pamulang Tim., Kec. Pamulang</p>
                <p>Kota Tangerang Selatan, Banten 15412</p>
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
