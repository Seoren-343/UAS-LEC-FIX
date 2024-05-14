<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
</head>
<body>
    <nav class="navbar">
        <a class="navbar-brand" href="#">Your Website</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Founder</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('busFol.bus') }}">Category Bus</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
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
                    <td>
                        <!-- Office Number Edit -->
                        <input type="text" name="office_num_{{ $contact->id }}" value="{{ $contact->office_num }}">
                    </td>
                    <td>
                        <!-- Fax Edit -->
                        <input type="text" name="fax_{{ $contact->id }}" value="{{ $contact->fax }}">
                    </td>
                    <td>
                        <!-- Location Edit -->
                        <input type="text" name="location_{{ $contact->id }}" value="{{ $contact->location }}">
                    </td>
                    <td>
                        <!-- Edit Button -->
                        <form action="{{ route('contactFol.contactupdate', $contact->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                        <!-- Delete Button -->
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
