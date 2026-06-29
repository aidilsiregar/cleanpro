<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanPro - Jasa Cleaning Service Profesional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        /* Navbar Styles */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            padding: 15px 0;
            transition: all 0.3s ease;
        }
        .navbar-custom.scrolled {
            box-shadow: 0 4px 30px rgba(0,0,0,0.12);
        }
        .navbar-custom .navbar-brand {
            font-weight: 800;
            font-size: 1.8rem;
            color: #2d3748;
        }
        .navbar-custom .navbar-brand span {
            color: #667eea;
        }
        .navbar-custom .navbar-brand i {
            color: #667eea;
        }
        .navbar-custom .nav-link {
            font-weight: 600;
            color: #4a5568 !important;
            padding: 8px 16px !important;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
        }
        .navbar-custom .nav-link:hover {
            color: #667eea !important;
            background: rgba(102, 126, 234, 0.08);
        }
        .navbar-custom .nav-link.active {
            color: #667eea !important;
            background: rgba(102, 126, 234, 0.12);
        }
        .navbar-custom .nav-link .badge {
            background: #667eea;
            color: white;
            font-size: 10px;
            padding: 2px 8px;
            border-radius: 20px;
            margin-left: 4px;
        }
        .navbar-custom .btn-login {
            background: transparent;
            border: 2px solid #667eea;
            color: #667eea;
            border-radius: 10px;
            padding: 8px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .navbar-custom .btn-login:hover {
            background: #667eea;
            color: white;
        }
        .navbar-custom .btn-register {
            background: #667eea;
            border: none;
            color: white;
            border-radius: 10px;
            padding: 10px 28px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .navbar-custom .btn-register:hover {
            background: #5a67d8;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }
        
        /* Dropdown Menu */
        .navbar-custom .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.12);
            padding: 8px;
        }
        .navbar-custom .dropdown-item {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            color: #4a5568;
        }
        .navbar-custom .dropdown-item:hover {
            background: rgba(102, 126, 234, 0.08);
            color: #667eea;
        }
        .navbar-custom .dropdown-item i {
            width: 20px;
            color: #667eea;
        }

        /* Hero Section */
        .hero {
            padding: 120px 0 80px;
            background: linear-gradient(135deg, #f5f7ff 0%, #e8ecff 100%);
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.08) 0%, transparent 70%);
            border-radius: 50%;
        }
        .hero::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(118, 75, 162, 0.06) 0%, transparent 70%);
            border-radius: 50%;
        }
        .hero .hero-content {
            position: relative;
            z-index: 2;
        }
        .hero .hero-badge {
            display: inline-block;
            background: rgba(102, 126, 234, 0.12);
            color: #667eea;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .hero h1 {
            font-size: 4rem;
            font-weight: 900;
            color: #1a202c;
            line-height: 1.1;
            margin-bottom: 20px;
        }
        .hero h1 span {
            color: #667eea;
            position: relative;
        }
        .hero h1 span::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 12px;
            background: rgba(102, 126, 234, 0.2);
            border-radius: 4px;
            z-index: -1;
        }
        .hero p {
            font-size: 1.2rem;
            color: #4a5568;
            max-width: 500px;
            line-height: 1.8;
            margin-bottom: 30px;
        }
        .hero .btn-hero-primary {
            background: #667eea;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px 40px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 25px rgba(102, 126, 234, 0.35);
        }
        .hero .btn-hero-primary:hover {
            background: #5a67d8;
            transform: translateY(-3px);
            box-shadow: 0 8px 35px rgba(102, 126, 234, 0.45);
        }
        .hero .btn-hero-secondary {
            background: white;
            color: #4a5568;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px 36px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        .hero .btn-hero-secondary:hover {
            border-color: #667eea;
            color: #667eea;
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }
        .hero .hero-stats {
            display: flex;
            gap: 40px;
            margin-top: 40px;
        }
        .hero .hero-stats .stat-item h3 {
            font-size: 2rem;
            font-weight: 800;
            color: #1a202c;
            margin-bottom: 2px;
        }
        .hero .hero-stats .stat-item p {
            font-size: 0.9rem;
            color: #718096;
            margin-bottom: 0;
        }
        .hero .hero-image {
            position: relative;
            z-index: 2;
        }
        .hero .hero-image img {
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
        }
        .hero .floating-card {
            position: absolute;
            background: white;
            border-radius: 16px;
            padding: 16px 24px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 3;
            animation: float 3s ease-in-out infinite;
        }
        .hero .floating-card-1 {
            top: 10%;
            right: -5%;
            animation-delay: 0s;
        }
        .hero .floating-card-2 {
            bottom: 15%;
            left: -5%;
            animation-delay: 1.5s;
        }
        .hero .floating-card i {
            font-size: 28px;
            color: #667eea;
        }
        .hero .floating-card .text h6 {
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 0;
            font-size: 14px;
        }
        .hero .floating-card .text small {
            color: #718096;
            font-size: 12px;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        /* Section Styles */
        .section-title {
            font-weight: 800;
            color: #1a202c;
            margin-bottom: 12px;
        }
        .section-subtitle {
            color: #718096;
            max-width: 600px;
            margin: 0 auto 40px;
        }

        /* Services Section */
        .services-section {
            padding: 80px 0;
            background: white;
        }
        .service-card {
            border: none;
            border-radius: 16px;
            padding: 30px 25px;
            text-align: center;
            transition: all 0.4s ease;
            background: #f8faff;
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            opacity: 0;
            transition: all 0.4s ease;
        }
        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 50px rgba(102, 126, 234, 0.12);
            background: white;
        }
        .service-card:hover::before {
            opacity: 1;
        }
        .service-card .icon {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            background: rgba(102, 126, 234, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            font-size: 28px;
            color: #667eea;
            transition: all 0.4s ease;
        }
        .service-card:hover .icon {
            background: #667eea;
            color: white;
            transform: scale(1.1) rotate(-5deg);
        }
        .service-card .price {
            font-weight: 800;
            color: #667eea;
            font-size: 1.4rem;
        }
        .service-card .btn-book {
            background: #667eea;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }
        .service-card .btn-book:hover {
            background: #5a67d8;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.35);
        }

        /* Features Section */
        .features-section {
            padding: 80px 0;
            background: #f8faff;
        }
        .feature-item {
            text-align: center;
            padding: 30px;
            border-radius: 16px;
            transition: all 0.4s ease;
        }
        .feature-item:hover {
            background: white;
            box-shadow: 0 10px 40px rgba(0,0,0,0.06);
        }
        .feature-item .icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: rgba(102, 126, 234, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 24px;
            color: #667eea;
        }
        .feature-item h5 {
            font-weight: 700;
            color: #1a202c;
        }
        .feature-item p {
            color: #718096;
            font-size: 0.95rem;
        }

        /* Testimonials Section */
        .testimonials-section {
            padding: 80px 0;
            background: white;
        }
        .testimonial-card {
            border: none;
            border-radius: 16px;
            padding: 30px;
            background: #f8faff;
            transition: all 0.4s ease;
            height: 100%;
        }
        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 40px rgba(0,0,0,0.06);
        }
        .testimonial-card .rating {
            color: #f6c445;
            margin-bottom: 12px;
        }
        .testimonial-card .testimonial-text {
            color: #4a5568;
            font-style: italic;
            line-height: 1.7;
        }
        .testimonial-card .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #e2e8f0;
        }
        .testimonial-card .user-info .avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #667eea;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
        }
        .testimonial-card .user-info h6 {
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 0;
        }
        .testimonial-card .user-info small {
            color: #718096;
        }

        /* CTA Section */
        .cta-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }
        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 500px;
            height: 500px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
        }
        .cta-section h2 {
            font-weight: 800;
            font-size: 2.8rem;
        }
        .cta-section .btn-cta {
            background: white;
            color: #667eea;
            border: none;
            border-radius: 12px;
            padding: 14px 45px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        .cta-section .btn-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }

        /* Articles Section */
        .articles-section {
            padding: 80px 0;
            background: #f8faff;
        }
        .article-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s ease;
            background: white;
            height: 100%;
        }
        .article-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 50px rgba(0,0,0,0.08);
        }
        .article-card .card-body {
            padding: 24px;
        }
        .article-card .card-body .category {
            display: inline-block;
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 12px;
        }
        .article-card .card-body h5 {
            font-weight: 700;
            color: #1a202c;
        }
        .article-card .card-body p {
            color: #718096;
            font-size: 0.95rem;
        }

        /* Footer */
        .footer {
            background: #1a202c;
            color: #a0aec0;
            padding: 60px 0 30px;
        }
        .footer h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .footer a {
            color: #a0aec0;
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            padding: 4px 0;
        }
        .footer a:hover {
            color: #667eea;
            padding-left: 5px;
        }
        .footer .social-icons a {
            display: inline-block;
            margin-right: 12px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            color: #a0aec0;
            text-decoration: none;
        }
        .footer .social-icons a:hover {
            background: #667eea;
            color: white;
            transform: translateY(-3px);
        }
        .footer .footer-bottom {
            border-top: 1px solid #2d3748;
            padding-top: 20px;
            margin-top: 40px;
            text-align: center;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .hero {
                padding: 100px 0 60px;
            }
            .hero h1 {
                font-size: 2.5rem;
            }
            .hero .hero-stats {
                flex-wrap: wrap;
                gap: 20px;
            }
            .hero .floating-card {
                display: none;
            }
            .navbar-custom .navbar-brand {
                font-size: 1.4rem;
            }
            .cta-section h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-broom"></i> Clean<span>Pro</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Pages
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-alt"></i> About Us</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-users"></i> Our Team</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-quote-right"></i> Testimonials</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-question-circle"></i> FAQ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                <div class="d-flex gap-2">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-login">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-register">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    @else
                        <div class="dropdown">
                            <button class="btn btn-register dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user"></i> {{ Auth::user()->name }}
                            </button>
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
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <div class="hero-badge">
                        <i class="fas fa-star"></i> Rated 4.9/5 by 500+ customers
                    </div>
                    <h1>
                        Layanan Cleaning <br>
                        <span>Profesional</span>
                    </h1>
                    <p>
                        Bersihkan rumah, kantor, atau gedung Anda dengan tenaga profesional 
                        terpercaya. Booking sekarang dan dapatkan harga spesial!
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        @guest
                            <a href="{{ route('register') }}" class="btn btn-hero-primary">
                                <i class="fas fa-calendar-plus"></i> Booking Sekarang
                            </a>
                            <a href="#services" class="btn btn-hero-secondary">
                                <i class="fas fa-info-circle"></i> Lihat Layanan
                            </a>
                        @else
                            <a href="{{ route('user.bookings.create') }}" class="btn btn-hero-primary">
                                <i class="fas fa-calendar-plus"></i> Booking Sekarang
                            </a>
                            <a href="#services" class="btn btn-hero-secondary">
                                <i class="fas fa-info-circle"></i> Lihat Layanan
                            </a>
                        @endguest
                    </div>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <h3>{{ $totalCustomers ?? 0 }}+</h3>
                            <p>Pelanggan Puas</p>
                        </div>
                        <div class="stat-item">
                            <h3>{{ $totalBookings ?? 0 }}+</h3>
                            <p>Booking Selesai</p>
                        </div>
                        <div class="stat-item">
                            <h3>{{ $totalPetugas ?? 0 }}+</h3>
                            <p>Petugas Ahli</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-image">
                    <div class="position-relative">
                        <img src="https://img.freepik.com/free-vector/house-cleaning-concept-illustration_114360-9277.jpg" 
                             alt="Cleaning Service" class="img-fluid">
                        <div class="floating-card floating-card-1">
                            <i class="fas fa-user-check"></i>
                            <div class="text">
                                <h6>500+ Customer</h6>
                                <small>Puas dengan layanan</small>
                            </div>
                        </div>
                        <div class="floating-card floating-card-2">
                            <i class="fas fa-star"></i>
                            <div class="text">
                                <h6>4.9/5 Rating</h6>
                                <small>Dari 500+ ulasan</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="about">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="section-title">Kenapa Memilih CleanPro?</h2>
                    <p class="section-subtitle">Kami memberikan layanan terbaik dengan kualitas yang terjamin</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="feature-item">
                        <div class="icon"><i class="fas fa-user-check"></i></div>
                        <h5>Profesional</h5>
                        <p>Tenaga berpengalaman dan terlatih</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-item">
                        <div class="icon"><i class="fas fa-clock"></i></div>
                        <h5>Tepat Waktu</h5>
                        <p>Datang sesuai jadwal booking</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-item">
                        <div class="icon"><i class="fas fa-shield-alt"></i></div>
                        <h5>Terpercaya</h5>
                        <p>Asuransi dan garansi kepuasan</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-item">
                        <div class="icon"><i class="fas fa-tag"></i></div>
                        <h5>Harga Terjangkau</h5>
                        <p>Harga kompetitif dengan kualitas terbaik</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section" id="services">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="section-title">Layanan Kami</h2>
                    <p class="section-subtitle">Pilih layanan yang sesuai dengan kebutuhan Anda</p>
                </div>
            </div>
            <div class="row">
                @forelse($services as $service)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="service-card">
                            <div class="icon">
                                <i class="fas fa-broom"></i>
                            </div>
                            <h5>{{ $service->name }}</h5>
                            <p class="text-muted" style="font-size: 0.9rem;">{{ Str::limit($service->description, 80) }}</p>
                            <div class="price">Rp {{ number_format($service->price, 0, ',', '.') }}</div>
                            <small class="text-muted">
                                <i class="far fa-clock"></i> {{ $service->duration_minutes }} menit
                            </small>
                            <div class="mt-3">
                                @guest
                                    <a href="{{ route('register') }}" class="btn btn-book">
                                        <i class="fas fa-shopping-cart"></i> Booking
                                    </a>
                                @else
                                    <a href="{{ route('user.bookings.create') }}?service={{ $service->id }}" class="btn btn-book">
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

    <!-- Testimonials Section -->
    <section class="testimonials-section" id="testimonials">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="section-title">Testimoni Pelanggan</h2>
                    <p class="section-subtitle">Apa kata mereka tentang layanan kami</p>
                </div>
            </div>
            <div class="row">
                @forelse($reviews as $review)
                    <div class="col-md-4 mb-4">
                        <div class="testimonial-card">
                            <div class="rating">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <p class="testimonial-text">"{{ Str::limit($review->comment, 100) }}"</p>
                            <div class="user-info">
                                <div class="avatar">{{ substr($review->user->name, 0, 1) }}</div>
                                <div>
                                    <h6>{{ $review->user->name }}</h6>
                                    <small>Pelanggan CleanPro</small>
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

    <!-- CTA Section -->
    <section class="cta-section" id="contact">
        <div class="container text-center">
            <h2>Siap untuk Rumah Bersih?</h2>
            <p class="lead mb-4" style="opacity: 0.9;">Booking sekarang dan dapatkan layanan cleaning terbaik!</p>
            @guest
                <a href="{{ route('register') }}" class="btn btn-cta">
                    <i class="fas fa-calendar-plus"></i> Daftar Sekarang
                </a>
            @else
                <a href="{{ route('user.bookings.create') }}" class="btn btn-cta">
                    <i class="fas fa-calendar-plus"></i> Booking Sekarang
                </a>
            @endguest
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5>
                        <i class="fas fa-broom"></i> Clean<span style="color: #667eea;">Pro</span>
                    </h5>
                    <p style="font-size: 0.95rem; max-width: 300px;">
                        Jasa cleaning service profesional dengan tenaga terlatih dan harga terjangkau.
                    </p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Quick Links</h5>
                    <a href="/">Home</a>
                    <a href="#services">Services</a>
                    <a href="#about">About</a>
                    <a href="#contact">Contact</a>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Services</h5>
                    <a href="#">Rumah</a>
                    <a href="#">Kantor</a>
                    <a href="#">Deep Cleaning</a>
                    <a href="#">Karpet</a>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5>Contact Info</h5>
                    <p><i class="fas fa-map-marker-alt" style="color: #667eea; width: 20px;"></i> Jakarta, Indonesia</p>
                    <p><i class="fas fa-phone" style="color: #667eea; width: 20px;"></i> +62 812 3456 7890</p>
                    <p><i class="fas fa-envelope" style="color: #667eea; width: 20px;"></i> info@cleanpro.com</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">&copy; {{ date('Y') }} CleanPro. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('mainNav');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>