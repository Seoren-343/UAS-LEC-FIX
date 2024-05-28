<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link href="{{ asset('css/gallery.css') }}" rel="stylesheet">
    <style>
        .image-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .gallery-item {
            flex: 0 0 calc(25% - 20px); /* Adjust width as needed */
            margin-bottom: 20px;
        }

        .img-thumbnail {
            max-width: 100%;
            height: auto;
        }
    </style>
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
</body>
</html>
