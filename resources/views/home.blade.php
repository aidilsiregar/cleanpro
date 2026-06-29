<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanPro - Jasa Cleaning Service Profesional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
        }
        .service-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .service-card .price {
            color: #667eea;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: rgba(102, 126, 234, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 28px;
            color: #667eea;
        }
        .testimonial-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .testimonial-card .rating {
            color: #f6c445;
        }
        .btn-primary {
            background: #667eea;
            border: none;
            padding: 12px 30px;
        }
        .btn-primary:hover {
            background: #5a67d8;
        }
        .btn-outline-light:hover {
            background: rgba(255,255,255,0.1);
        }
        footer {
            background: #1a202c;
            color: white;
            padding: 40px 0;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .section-title {
            position: relative;
            margin-bottom: 40px;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: #667eea;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-broom"></i> CleanPro
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#articles">Artikel</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-light btn-sm px-3" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link btn btn-primary btn-sm px-3 text-white" href="{{ route('register') }}">
                                <i class="fas fa-user-plus"></i> Register
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @if(Auth::user()->hasRole('admin'))
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-tachometer-alt"></i> Dashboard Admin
                                    </a></li>
                                @elseif(Auth::user()->hasRole('petugas'))
                                    <li><a class="dropdown-item" href="{{ route('petugas.dashboard') }}">
                                        <i class="fas fa-tachometer-alt"></i> Dashboard Petugas
                                    </a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                        <i class="fas fa-tachometer-alt"></i> Dashboard User
                                    </a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-3 fw-bold">Layanan Cleaning Profesional</h1>
                    <p class="lead mt-3">Bersihkan rumah, kantor, atau gedung Anda dengan tenaga profesional terpercaya. Booking sekarang dan dapatkan harga spesial!</p>
                    <div class="mt-4">
                        @guest
                            <a href="{{ route('register') }}" class="btn btn-light btn-lg">
                                <i class="fas fa-calendar-plus"></i> Booking Sekarang
                            </a>
                            <a href="#services" class="btn btn-outline-light btn-lg ms-2">
                                <i class="fas fa-info-circle"></i> Lihat Layanan
                            </a>
                        @else
                            <a href="{{ route('user.bookings.create') }}" class="btn btn-light btn-lg">
                                <i class="fas fa-calendar-plus"></i> Booking Sekarang
                            </a>
                            <a href="#services" class="btn btn-outline-light btn-lg ms-2">
                                <i class="fas fa-info-circle"></i> Lihat Layanan
                            </a>
                        @endguest
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="https://img.freepik.com/free-vector/house-cleaning-concept-illustration_114360-9277.jpg" alt="Cleaning Service" class="img-fluid" style="max-height: 400px;">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Layanan Kami</h2>
            <div class="row">
                @forelse($services as $service)
                    <div class="col-md-4 mb-4">
                        <div class="card service-card h-100">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon mx-auto">
                                    <i class="fas fa-broom"></i>
                                </div>
                                <h5 class="card-title mt-3">{{ $service->name }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($service->description, 100) }}</p>
                                <div class="price">Rp {{ number_format($service->price, 0, ',', '.') }}</div>
                                <small class="text-muted">
                                    <i class="far fa-clock"></i> {{ $service->duration_minutes }} menit
                                </small>
                                <br>
                                @guest
                                    <a href="{{ route('register') }}" class="btn btn-primary w-100 mt-3">
                                        <i class="fas fa-shopping-cart"></i> Booking
                                    </a>
                                @else
                                    <a href="{{ route('user.bookings.create') }}?service={{ $service->id }}" class="btn btn-primary w-100 mt-3">
                                        <i class="fas fa-shopping-cart"></i> Booking
                                    </a>
                                @endguest
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Belum ada layanan tersedia</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title">Kenapa Memilih CleanPro?</h2>
            <div class="row mt-4">
                <div class="col-md-3 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h5>Profesional</h5>
                    <p class="text-muted">Tenaga berpengalaman dan terlatih</p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5>Tepat Waktu</h5>
                    <p class="text-muted">Datang sesuai jadwal booking</p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h5>Terpercaya</h5>
                    <p class="text-muted">Asuransi dan garansi kepuasan</p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-tag"></i>
                    </div>
                    <h5>Harga Terjangkau</h5>
                    <p class="text-muted">Harga kompetitif dengan kualitas terbaik</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Testimoni Pelanggan</h2>
            <div class="row">
                @forelse($reviews as $review)
                    <div class="col-md-4 mb-4">
                        <div class="card testimonial-card h-100">
                            <div class="card-body">
                                <div class="rating mb-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->rating)
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <p class="card-text">"{{ Str::limit($review->comment, 100) }}"</p>
                                <div class="d-flex align-items-center mt-3">
                                    <div class="avatar-circle me-2">
                                        {{ substr($review->user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $review->user->name }}</h6>
                                        <small class="text-muted">Pelanggan CleanPro</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Belum ada testimoni</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Articles Section -->
    <section id="articles" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title">Artikel Terbaru</h2>
            <div class="row">
                @forelse($articles as $article)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($article->content, 120) }}</p>
                                <small class="text-muted">
                                    <i class="far fa-calendar-alt"></i> 
                                    {{ $article->formatted_date }}
                                </small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Belum ada artikel</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5" style="background: #667eea; color: white;">
        <div class="container text-center">
            <h2 class="mb-3">Siap untuk Rumah Bersih?</h2>
            <p class="lead">Booking sekarang dan dapatkan layanan cleaning terbaik!</p>
            @guest
                <a href="{{ route('register') }}" class="btn btn-light btn-lg mt-3">
                    <i class="fas fa-calendar-plus"></i> Daftar Sekarang
                </a>
            @else
                <a href="{{ route('user.bookings.create') }}" class="btn btn-light btn-lg mt-3">
                    <i class="fas fa-calendar-plus"></i> Booking Sekarang
                </a>
            @endguest
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p class="mb-0">&copy; {{ date('Y') }} CleanPro - Jasa Cleaning Service Profesional. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>