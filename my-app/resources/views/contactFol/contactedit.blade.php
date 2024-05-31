<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link href="{{ asset('css/Contact.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('founders') }}">Founder</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('busFol.bus') }}">Category Bus</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('galleries') }}">Gallery</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('aboutUs') }}">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('contactFol.contacts') }}">Contact</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Edit Contact</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Office Number</th>
                    <th>Fax</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <form action="{{ route('contactFol.contactupdate', $contact->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('PUT')
                        <td>
                            <input type="text" name="office_num" value="{{ $contact->office_num }}" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="fax" value="{{ $contact->fax }}" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="location" value="{{ $contact->location }}" class="form-control">
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </td>
                    </form>
                    <td>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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
