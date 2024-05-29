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

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
        .navbar-brand i {
            margin-right: 0.5rem;
        }
        .header {
            background-color: #007bff;
            color: white;
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
    </style>
</head>


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
                            <i class="fas fa-user"></i> Profil
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

    <header class="header text-center py-5">
        <div class="container">
            <h1>Selamat Datang di JobFinder</h1>
            <p class="lead">Temukan pekerjaan impian Anda dengan mudah</p>
            <a href="#" class="btn btn-light btn-lg"><i class="fas fa-search"></i> Mulai Mencari</a>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center icon-section">
                    <i class="fas fa-briefcase fa-3x mb-3"></i>
                    <h3>Daftar Pekerjaan yang Luas</h3>
                    <p>Telusuri ribuan daftar pekerjaan dari berbagai industri.</p>
                </div>
                <div class="col-md-4 text-center icon-section">
                    <i class="fas fa-users fa-3x mb-3"></i>
                    <h3>Peluang Jaringan</h3>
                    <p>Terhubung dengan profesional dan kembangkan jaringan Anda.</p>
                </div>
                <div class="col-md-4 text-center icon-section">
                    <i class="fas fa-file-alt fa-3x mb-3"></i>
                    <h3>Pengajuan Mudah</h3>
                    <p>Ajukan lamaran pekerjaan dengan cepat dan mudah dengan proses yang sederhana.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Kategori Pencarian Kerja yang Paling Dicari</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <img src="" class="card-img-top" alt="Teknologi Informasi">
                        <div class="card-body text-center">
                            <i class="fas fa-laptop-code fa-3x mb-3"></i>
                            <h4 class="card-title">Teknologi Informasi</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="" class="card-img-top" alt="Kesehatan">
                        <div class="card-body text-center">
                            <i class="fas fa-stethoscope fa-3x mb-3"></i>
                            <h4 class="card-title">Kesehatan</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="" class="card-img-top" alt="Keuangan">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-line fa-3x mb-3"></i>
                            <h4 class="card-title">Keuangan</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="" class="card-img-top" alt="Manufaktur">
                        <div class="card-body text-center">
                            <i class="fas fa-building fa-3x mb-3"></i>
                            <h4 class="card-title">Manufaktur</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-light py-4">
        <div class="container text-center">
            <p class="mb-0">© 2024 JobFinder. Hak cipta dilindungi undang-undang.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

