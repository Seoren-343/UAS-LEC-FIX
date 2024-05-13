<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Edit Bus</h1>

        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Bus edit form -->
        <form action="{{ route('busFol.update', $bus->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="bus_picture">Bus Picture URL:</label>
                <input type="text" id="bus_picture" name="bus_picture" class="form-control" value="{{ $bus->bus_picture }}" required>
            </div>
            
            <!-- New Picture Upload -->
            <div class="form-group">
                <label for="new_bus_picture">New Bus Picture:</label>
                <input type="file" id="new_bus_picture" name="new_bus_picture" class="form-control-file">
            </div>
            
            <div class="form-group">
                <label for="bus_type">Bus Type:</label>
                <input type="text" id="bus_type" name="bus_type" class="form-control" value="{{ $bus->bus_type }}" required>
            </div>
            <div class="form-group">
                <label for="specs">Specifications:</label>
                <textarea id="specs" name="specs" class="form-control" rows="5" required>{{ $bus->specs }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Bus</button>
        </form>        
    </div>
</body>
</html>
