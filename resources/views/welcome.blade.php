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
                <div class="col-md-4 text-center icon-section" data-aos="fade-up">
                    <i class="fas fa-briefcase fa-3x mb-3"></i>
                    <h3>Daftar Pekerjaan yang Luas</h3>
                    <p>Telusuri ribuan daftar pekerjaan dari berbagai industri.</p>
                </div>
                <div class="col-md-4 text-center icon-section" data-aos="fade-up" data-aos-delay="100">
                    <i class="fas fa-users fa-3x mb-3"></i>
                    <h3>Peluang Jaringan</h3>
                    <p>Terhubung dengan profesional dan kembangkan jaringan Anda.</p>
                </div>
                <div class="col-md-4 text-center icon-section" data-aos="fade-up" data-aos-delay="200">
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
                <div class="col-12 col-sm-6 col-lg-3 mb-3" data-aos="zoom-in">
                    <div class="card">
                        <img src="https://source.unsplash.com/400x300/?technology" class="card-img-top img-fluid" alt="Teknologi Informasi">
                        <div class="card-body text-center">
                            <i class="fas fa-laptop-code fa-3x mb-3"></i>
                            <h4 class="card-title">Teknologi Informasi</h4>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 mb-3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card">
                        <img src="https://source.unsplash.com/400x300/?health" class="card-img-top img-fluid" alt="Kesehatan">
                        <div class="card-body text-center">
                            <i class="fas fa-stethoscope fa-3x mb-3"></i>
                            <h4 class="card-title">Kesehatan</h4>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 mb-3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="card">
                        <img src="https://source.unsplash.com/400x300/?finance" class="card-img-top img-fluid" alt="Keuangan">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-line fa-3x mb-3"></i>
                            <h4 class="card-title">Keuangan</h4>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 mb-3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="card">
                        <img src="https://source.unsplash.com/400x300/?manufacturing" class="card-img-top img-fluid" alt="Manufaktur">
                        <div class="card-body text-center">
                            <i class="fas fa-building fa-3x mb-3"></i>
                            <h4 class="card-title">Manufaktur</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Perusahaan yang Bekerja Sama</h2>
            <div class="row justify-content-center">
                <div class="col-6 col-sm-4 col-md-2 company-logo" data-aos="fade-up">
                    <img src="https://logo.clearbit.com/google.com" alt="Google" class="img-fluid">
                </div>
                <div class="col-6 col-sm-4 col-md-2 company-logo" data-aos="fade-up" data-aos-delay="100">
                    <img src="https://logo.clearbit.com/pertamina.com" alt="Pertamina" class="img-fluid">
                </div>
                <div class="col-6 col-sm-4 col-md-2 company-logo" data-aos="fade-up" data-aos-delay="200">
                    <img src="https://logo.clearbit.com/microsoft.com" alt="Microsoft" class="img-fluid">
                </div>
                <div class="col-6 col-sm-4 col-md-2 company-logo" data-aos="fade-up" data-aos-delay="300">
                    <img src="https://logo.clearbit.com/apple.com" alt="Apple" class="img-fluid">
                </div>
                <!-- Tambahkan logo perusahaan lain di sini -->
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

    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
