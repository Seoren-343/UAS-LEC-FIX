<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Bus Entry</title>
    <link rel="stylesheet" href="#">
    <link href="{{ asset('css/AddBus.css') }}" rel="stylesheet">
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
        <h1>Create New Bus Entry</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('bus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="bus_picture">Bus Picture:</label>
                <input type="file" id="bus_picture" name="bus_picture" class="form-control-file" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="additional_images">Additional Images:</label>
                <button type="button" class="btn btn-secondary" id="addImage">Add Image</button>
                <div class="image-preview" id="imagePreview"></div>
                <input type="file" id="additional_images" name="additional_images[]" class="form-control-file" accept="image/*" multiple style="display: none;">
            </div>
            <div class="form-group">
                <label for="bus_type">Bus Type:</label>
                <select id="bus_type" name="bus_type" class="form-control" required>
                    <option value="big bus">Big Bus</option>
                    <option value="medium bus">Medium Bus</option>
                    <option value="small bus">Small Bus</option>
                </select>
            </div>
            <div class="form-group">
                <label for="specs">Specifications:</label>
                <textarea id="specs" name="specs" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Bus</button>
        </form>
    </div>
    <script>
        document.getElementById('addImage').addEventListener('click', function() {
            const input = document.createElement('input');
            input.type = 'file';
            input.name = 'additional_images[]';
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
                        imagePreview.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                }
            });
            
            document.getElementById('imagePreview').appendChild(input);
            input.click();
        });
    </script>
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



