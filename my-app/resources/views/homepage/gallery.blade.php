<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link href="#" rel="stylesheet">
</head>
<body>
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

