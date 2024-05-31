<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link href="{{ asset('css/Contact.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <a class="navbar-brand" href="#">Contacts</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('founders') }}">Founder</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('category-bus') }}">Category Bus</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('galleries') }}">Gallery</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('aboutUs') }}">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('contacts') }}">Contact</a></li>
        </ul>
        @auth
            @if(Auth::user()->isAdmin())
                <form action="{{ route('admin.logout') }}" method="POST" class="form-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            @endif
        @endauth
    </nav>
    <div class="container">
        <h1>Contacts</h1>
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
                    @auth
                        @if(Auth::user()->isAdmin())
                            <th>Actions</th>
                        @endif
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->office_num }}</td>
                        <td>{{ $contact->fax }}</td>
                        <td>{{ $contact->location }}</td>
                        @auth
                            @if(Auth::user()->isAdmin())
                                <td>
                                    <a href="{{ route('contactFol.contactedit', $contact->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                                    </form>
                                </td>
                            @endif
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
        @auth
            @if(Auth::user()->isAdmin())
                <a href="{{ route('contactFol.contactcreate') }}" class="btn btn-success">Create Contact</a>
            @endif
        @endauth
    </div>
</body>
</html>

