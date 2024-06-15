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
    background: url('https://img.freepik.com/free-photo/top-view-hands-typing-laptop_23-2148792017.jpg?w=1380&t=st=1686238397~exp=1686238997~hmac=f3cb5c62b1f9da4a6f5276f67f5f4f4f90a91de645dd7edcbd438ec04b4d517a') no-repeat center center;
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
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-briefcase"></i> JobFinder
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">
                            <i class="fas fa-home"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('seeker.jobs.index') }}">
                            <i class="fas fa-search"></i> Cari Pekerjaan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">
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
            <a href="{{ route('seeker.jobs.index') }}" class="btn btn-light btn-lg"><i class="fas fa-search"></i> Mulai Mencari</a>
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
                    <img src="https://images.pexels.com/photos/3560168/pexels-photo-3560168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=300&w=400" class="card-img-top img-fluid" alt="Teknologi Informasi">
                    <div class="card-body text-center">
                        <i class="fas fa-laptop-code fa-3x mb-3"></i>
                        <h4 class="card-title">Teknologi Informasi</h4>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-3" data-aos="zoom-in" data-aos-delay="100">
                <div class="card">
                    <img src="https://images.pexels.com/photos/40568/medical-appointment-doctor-healthcare-40568.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=300&w=400" class="card-img-top img-fluid" alt="Kesehatan">
                    <div class="card-body text-center">
                        <i class="fas fa-stethoscope fa-3x mb-3"></i>
                        <h4 class="card-title">Kesehatan</h4>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-3" data-aos="zoom-in" data-aos-delay="200">
                <div class="card">
                    <img src="https://images.pexels.com/photos/210607/pexels-photo-210607.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=300&w=400" class="card-img-top img-fluid" alt="Keuangan">
                    <div class="card-body text-center">
                        <i class="fas fa-chart-line fa-3x mb-3"></i>
                        <h4 class="card-title">Keuangan</h4>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-3" data-aos="zoom-in" data-aos-delay="300">
                <div class="card">
                    <img src="https://images.pexels.com/photos/236907/pexels-photo-236907.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=300&w=400" class="card-img-top img-fluid" alt="Manufaktur">
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
            <h2 class="text-center mb-4">Lowongan Pekerjaan Tersedia</h2>
            <div class="row">
                @foreach ($jobs as $job)
                    <div class="col-12 col-sm-6 col-lg-4 mb-3" data-aos="zoom-in">
                        <div class="card">
                            <div class="card-body text-center">
                                <i class="fas fa-briefcase card-icon"></i>
                                <h4 class="card-title">{{ $job->jobTitle }}</h4>
                                <p class="card-text"><i class="fas fa-align-left"></i> {{ $job->jobDescription }}</p>
                                <p class="card-text"><i class="fas fa-map-marker-alt"></i> <strong>Lokasi:</strong> {{ $job->jobLocation }}</p>
                                <p class="card-text"><i class="fas fa-clipboard-list"></i> <strong>Tipe:</strong> {{ $job->jobType }}</p>
                                <p class="card-text"><i class="fas fa-dollar-sign"></i> <strong>Gaji:</strong> {{ $job->salary }}</p>
                                <p class="card-text">
                                    <i class="fas fa-info-circle"></i> <strong>Status:</strong> 
                                    <span class="job-status-{{ $job->jobStatus }}">
                                        {{ ucfirst($job->jobStatus) }}
                                    </span>
                                </p>
                                <a href="{{ route('seeker.jobs.index') }}" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
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

    <section class="contact-section" id="contact">
        <div class="container">
            <h2 class="text-center mb-4">Hubungi Kami</h2>
            <div class="row">
                <div class="col-md-4 text-center" data-aos="fade-up">
                    <i class="fas fa-phone-alt contact-icon"></i>
                    <h5>Telepon</h5>
                    <p>+62 123 456 789</p>
                </div>
                <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="100">
                    <i class="fas fa-envelope contact-icon"></i>
                    <h5>Email</h5>
                    <p>support@jobfinder.com</p>
                </div>
                <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-map-marker-alt contact-icon"></i>
                    <h5>Alamat</h5>
                    <p>Jl. Merdeka No. 123, Jakarta</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6 mx-auto">
                    <form>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" placeholder="Nama Anda">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email Anda">
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan</label>
                            <textarea class="form-control" id="message" rows="4" placeholder="Pesan Anda"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Kirim Pesan</button>
                    </form>
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

    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
