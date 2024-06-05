<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JobFinder - Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?job') no-repeat center center;
            background-size: cover;
            color: white;
        }
        .form-container {
            max-width: 500px;
            margin: 5% auto;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 2rem;
            border-radius: 10px;
            animation: fadeIn 0.5s ease; /* Animasi muncul */
        }
        .form-control {
            background-color: #333;
            color: #fff;
            border: none;
        }
        .form-control:focus {
            background-color: #444;
            color: #fff;
            border: none;
        }
        .form-check-label {
            color: #fff;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .text-decoration-none {
            color: #007bff;
        }
        .text-decoration-none:hover {
            color: #0056b3;
        }
        .navbar-brand i {
            margin-right: 0.5rem;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-briefcase"></i> JobFinder
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <i class="fas fa-home"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-search"></i> Cari Pekerjaan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-envelope"></i> Hubungi Kami
                        </a>
                    </li>
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
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="form-container">
            <!-- Form Register -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username">
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>

                <!-- Register As -->
                <div class="form-group">
                    <label for="role">Register As</label>
                    <select id="role" class="form-control" name="role" required>
                        <option value="user">Pencari Kerja</option>
                        <option value="company">Perusahaan</option>
                    </select>
                </div>

                <!-- Already registered? -->
                <div class="form-group">
                    <a class="text-decoration-none" href="{{ route('login') }}">Already registered?</a>
                </div>

                <!-- Register Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
