<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Final Project') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Add your custom styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #ffffff; /* Set the background to white */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }
        .auth-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            flex-grow: 1; /* Allow the container to grow to fill available space */
        }
        .auth-box {
            width: 100%;
            max-width: 400px;
            background-color: wheat; /* Wheat-colored background for the container */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar-custom {
            background-color: #34495e; /* Custom navbar background */
            width: 100%; /* Ensure it spans the full width */
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff; /* Custom navbar text color */
        }
        .navbar-custom .nav-link:hover {
            color: #f39c12; /* Hover effect for links */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid"> <!-- Full-width container -->
            <a class="navbar-brand" href="{{ url('/') }}">Final Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::currentRouteName() !== 'login') <!-- Hide Login link on the login page -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                    @if (Route::currentRouteName() !== 'register') <!-- Hide Register link on the register page -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Authentication Container -->
    <div class="auth-container">
        <div class="auth-box">
            {{ $slot }}
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
