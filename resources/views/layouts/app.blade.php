<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CleanPro')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #1a202c;
        }
        .sidebar .nav-link {
            color: #cbd5e0;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 2px 8px;
        }
        .sidebar .nav-link:hover {
            color: white;
            background: #2d3748;
        }
        .sidebar .nav-link.active {
            color: white;
            background: #4a5568;
        }
        .sidebar .nav-link i {
            width: 20px;
            margin-right: 10px;
        }
        .main-content {
            background: #f7fafc;
            min-height: 100vh;
        }
        .card-stats {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .card-stats .card-body {
            padding: 20px;
        }
        .card-stats .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        footer {
            background: #1a202c;
            color: white;
            padding: 20px 0;
        }
        .avatar-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #4a5568;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="/">
                <i class="fas fa-broom"></i> CleanPro
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="avatar-circle d-inline-block me-1">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </span>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user-edit"></i> Profile
                                </a>
                            </li>
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
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-md-block sidebar p-3">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        @if(Auth::user()->hasRole('admin'))
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
                                   href="{{ route('admin.dashboard') }}">
                                    <i class="fas fa-chart-pie"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}" 
                                   href="{{ route('admin.bookings.index') }}">
                                    <i class="fas fa-calendar-check"></i> Booking
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" 
                                   href="{{ route('admin.services.index') }}">
                                    <i class="fas fa-concierge-bell"></i> Layanan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" 
                                   href="{{ route('admin.users.index') }}">
                                    <i class="fas fa-users"></i> Petugas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.attendances.*') ? 'active' : '' }}" 
                                   href="{{ route('admin.attendances.monitor') }}">
                                    <i class="fas fa-clipboard-check"></i> Absensi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}" 
                                   href="{{ route('admin.articles.index') }}">
                                    <i class="fas fa-newspaper"></i> Artikel
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#reportMenu">
                                    <i class="fas fa-file-alt"></i> Laporan
                                </a>
                                <div class="collapse" id="reportMenu">
                                    <ul class="nav flex-column ms-3">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.reports.revenue') }}" target="_blank">
                                                <i class="fas fa-money-bill"></i> Revenue
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.reports.attendance') }}" target="_blank">
                                                <i class="fas fa-clipboard-list"></i> Absensi
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.reports.bookings') }}" target="_blank">
                                                <i class="fas fa-book"></i> Booking
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @elseif(Auth::user()->hasRole('petugas'))
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('petugas.dashboard') ? 'active' : '' }}" 
                                   href="{{ route('petugas.dashboard') }}">
                                    <i class="fas fa-chart-pie"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('petugas.tasks') ? 'active' : '' }}" 
                                   href="{{ route('petugas.tasks') }}">
                                    <i class="fas fa-tasks"></i> Tugas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('petugas.attendances.*') ? 'active' : '' }}" 
                                   href="{{ route('petugas.attendances.index') }}">
                                    <i class="fas fa-clipboard-check"></i> Absensi
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}" 
                                   href="{{ route('user.dashboard') }}">
                                    <i class="fas fa-chart-pie"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('user.bookings.*') ? 'active' : '' }}" 
                                   href="{{ route('user.bookings.index') }}">
                                    <i class="fas fa-calendar-check"></i> Booking
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.bookings.create') }}">
                                    <i class="fas fa-plus-circle"></i> Booking Baru
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 main-content py-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <footer class="text-center">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} CleanPro - Jasa Cleaning Service Profesional</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
</body>
</html>