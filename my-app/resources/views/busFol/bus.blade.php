<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Bus</title>
    <link href="{{ asset('css/bus.css') }}" rel="stylesheet">
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
        <h1>Category Bus</h1>
        @auth
            @if(Auth::user()->isAdmin())
            <div class="navbar-admin">
                <a class="btn btn-primary" href="{{ route('busFol.buscreation') }}">Add Bus</a>
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
                    <div class="image-gallery">
                        <img src="{{ asset($bus->bus_picture) }}" alt="{{ $bus->bus_type }}" class="img-thumbnail">
                        @foreach ($bus->additionalImages as $image)
                        <img src="{{ asset($image->image_path) }}" alt="{{ $bus->bus_type }}" class="img-thumbnail">
                        @endforeach
                    </div>
                    <h3>{{ $bus->bus_type }}</h3>
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

