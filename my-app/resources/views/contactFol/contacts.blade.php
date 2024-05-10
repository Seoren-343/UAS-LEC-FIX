<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Add CSS stylesheets or link to a CSS file here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
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
            margin: 50px auto 20px; /* Added margin-top for content */
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
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

    <!-- Page content -->
    <div class="container">
        <h1>Contacts</h1>

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
                        <td>{{ $contact->office_num }}</td>
                        <td>{{ $contact->fax }}</td>
                        <td>{{ $contact->location }}</td>
                        <td>
                            <a href="{{ route('contactFol.contactedit', $contact->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('contactFol.contacts', $contact->id) }}" method="POST" style="display: inline-block;">
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

    <!-- Add JavaScript scripts or link to a JS file here -->
</body>
</html>
