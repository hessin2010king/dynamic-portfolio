<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview of {{ $theme->name }}</title>
    <!-- Load the selected theme's CSS dynamically -->
    <link rel="stylesheet" href="{{ asset($theme->css_path) }}">
    <style>
        /* Custom styles for preview */
        .preview-container {
            width: 1127px; /* Adjusted width */
            height: auto; /* Set to auto to accommodate content height */
            background-color: #f8f9fa; /* Light background for contrast */
            border: 2px solid #ccc; /* Optional border for browser window effect */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow for depth */
            margin: 0 auto; /* Center the container */
            overflow: hidden; /* Prevent overflow */
            padding: 10px; /* Space around the container */
        }

        /* Optional: Center the content */
        body {
            justify-content: center;
            align-items: flex-start;
            background-color: #f8f9fa; /* Light background for contrast */
            margin: 0;
            padding: 10px; /* Space around the body */
        }

        /* Ensure the iframe fits within the container */
        .iframe-container {
            width: 1200px; /* Adjusted width */
            height: 1500px; /* Set a fixed height to match expected content height */
            border: none; /* Remove default border */
            transform: scale(0.25); /* Adjust scale to fit the container */
            transform-origin: top left; /* Adjusted origin */
        }

    </style>
</head>
<body>
    <!-- Preview Content Container -->
    <div class="preview-container">
        <h6 class="text-center mb-4">Preview of {{ $theme->name }}</h6>

        <!-- Embed the full portfolio layout using an iframe, passing the theme ID -->
        <iframe src="{{ route('portfolio') }}?theme={{ $theme->id }}" class="iframe-container"></iframe>

        <!-- Example Footer -->
        <footer class="mt-5">
            <p class="text-center">&copy; {{ now()->year }} {{ $theme->name }}. All rights reserved.</p>
        </footer>
    </div>

    <!-- Required JS for Bootstrap or any other libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
</body>
</html>
