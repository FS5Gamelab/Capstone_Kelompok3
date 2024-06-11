<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JobFinder</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
        .navbar-brand i {
            margin-right: 0.5rem;
        }
        .header {
            background: url('https://source.unsplash.com/1600x900/?job') no-repeat center center;
            background-size: cover;
            color: white;
            position: relative;
        }
        .header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }
        .header .container {
            position: relative;
            z-index: 1;
        }
        .header .btn {
            margin-top: 1rem;
        }
        .icon-section i {
            color: #007bff;
        }
        .card-title {
            font-size: 1.25rem;
            margin-top: 0.5rem;
        }
        footer {
            background-color: #f8f9fa;
            padding: 1rem 0;
        }
        .card img {
            object-fit: cover;
            height: 200px;
        }
        .company-logo img {
            max-width: 100px;
            margin: 15px;
        }
        .card-icon {
            font-size: 3em;
            margin-bottom: 1em;
        }
        .job-status-buka {
            color: green;
        }
        .job-status-tutup {
            color: red;
        }
        .contact-section {
            background-color: #f8f9fa;
            padding: 2rem 0;
        }
        .contact-section h2 {
            margin-bottom: 2rem;
        }
        .contact-section .contact-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
    </style>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('beranda') }}">
            <i class="fas fa-briefcase"></i> JobFinder
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('beranda') }}">
                        <i class="fas fa-home"></i> Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-search"></i> Cari Pekerjaan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">
                        <i class="fas fa-envelope"></i> Hubungi Kami
                    </a>
                </li>
                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-sign-in-alt"></i> Masuk / Daftar
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Masuk</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Daftar</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('seeker.profile.show', ['seekerId' => Auth::user()->id]) }}">Profil</a></li>
                            <li><a class="dropdown-item" href="{{ route('seeker.applied_jobs') }}">Jobs Dilamar</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
