<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link href="{{ asset('css/Contact.css') }}" rel="stylesheet">
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
            display: none; /* Initially hide all cards */
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
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('founders') }}">Founder</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('busFol.bus') }}">Category Bus</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('aboutUs') }}">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('contactFol.contacts') }}">Contact</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Edit Contact</h1>

        <!-- Display success message if any -->
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
</body>
</html>
