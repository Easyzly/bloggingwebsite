<!-- resources/views/media/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Screen Image</title>
</head>
<body>
<img src="{{ asset('images/' . $media->imagepath) }}" alt="Full Screen Image" style="width: 100%; height: 100vh; object-fit: contain;">
</body>
</html>
