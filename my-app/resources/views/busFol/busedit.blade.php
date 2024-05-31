<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('css/BusEdit.css') }}" rel="stylesheet">
    <style>
        .image-preview {
            display: flex;
            flex-wrap: wrap;
            margin-top: 10px;
        }
        .image-preview img {
            max-width: 100px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
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

    <div class="container mt-4">
        <h1>Edit Bus</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('busFol.update', $bus->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="bus_picture">Bus Picture:</label>
                <div>
                    <img src="{{ asset($bus->bus_picture) }}" alt="{{ $bus->bus_type }}" class="img-thumbnail" width="200">
                    <input type="checkbox" name="delete_bus_picture" value="1"> Delete current bus picture
                </div>
                <input type="file" id="bus_picture" name="bus_picture" class="form-control-file" onchange="previewImage(event, 'bus_picture_preview')">
                <img id="bus_picture_preview" class="img-thumbnail mt-2" style="display: none;" width="200">
            </div>
            <div class="form-group">
                <label for="additional_images">Current Additional Images:</label>
                <div id="current_additional_images" class="image-preview">
                    @foreach ($bus->additionalImages as $image)
                        <div class="additional-image-item">
                            <img src="{{ asset($image->image_path) }}" alt="{{ $bus->bus_type }}" class="img-thumbnail">
                            <input type="checkbox" name="delete_additional_images[]" value="{{ $image->id }}"> Delete this image
                        </div>
                    @endforeach
                </div>
                <label for="new_additional_images">Add New Additional Images:</label>
                <button type="button" class="btn btn-secondary" id="addImage">Add Image</button>
                <div class="image-preview" id="imagePreview"></div>
                <input type="file" id="new_additional_images" name="new_additional_images[]" class="form-control-file" accept="image/*" multiple style="display: none;">
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
    <script>
        function previewImage(event, previewId) {
            const input = event.target;
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }

        document.getElementById('addImage').addEventListener('click', function() {
            const input = document.createElement('input');
            input.type = 'file';
            input.name = 'new_additional_images[]';
            input.accept = 'image/*';
            input.classList.add('form-control-file');
            input.style.display = 'none';
            
            input.addEventListener('change', function(event) {
                const files = event.target.files;
                const imagePreview = document.getElementById('imagePreview');
                
                for (const file of files) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'img-thumbnail';
                        imagePreview.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                }
            });
            
            document.getElementById('imagePreview').appendChild(input);
            input.click();
        });
    </script>
</body>
</html>

