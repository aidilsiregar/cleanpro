@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-chart-pie text-primary"></i> Dashboard Admin</h1>
    <span class="badge bg-danger fs-6">Selamat datang, {{ Auth::user()->name }}!</span>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card card-stats bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Total Revenue</h6>
                        <h2 class="text-white">Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</h2>
                    </div>
                    <div class="stat-icon bg-white bg-opacity-25">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Total Booking</h6>
                        <h2 class="text-white">{{ $totalBookings ?? 0 }}</h2>
                    </div>
                    <div class="stat-icon bg-white bg-opacity-25">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Petugas</h6>
                        <h2 class="text-white">{{ $totalPetugas ?? 0 }}</h2>
                    </div>
                    <div class="stat-icon bg-white bg-opacity-25">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Layanan</h6>
                        <h2 class="text-white">{{ $totalServices ?? 0 }}</h2>
                    </div>
                    <div class="stat-icon bg-white bg-opacity-25">
                        <i class="fas fa-concierge-bell"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-chart-bar"></i> Statistik Booking (6 Bulan Terakhir)</h5>
            </div>
            <div class="card-body">
                <canvas id="bookingChart" height="250"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-user-check"></i> Absensi Hari Ini</h5>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <h2>{{ $presentToday ?? 0 }}</h2>
                    <p class="text-muted">Petugas Hadir</p>
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar bg-success" role="progressbar" 
                             style="width: {{ $totalPetugas > 0 ? ($presentToday / $totalPetugas) * 100 : 0 }}%">
                            {{ $totalPetugas > 0 ? round(($presentToday / $totalPetugas) * 100) : 0 }}%
                        </div>
                    </div>
                    <small class="text-muted">Dari {{ $totalPetugas ?? 0 }} petugas</small>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.attendances.monitor') }}" class="btn btn-outline-primary w-100">
                        <i class="fas fa-eye"></i> Monitor Absensi
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-edit"></i> Kelola Cepat</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary w-100">
                            <i class="fas fa-calendar-check"></i> Kelola Booking
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('admin.services.index') }}" class="btn btn-success w-100">
                            <i class="fas fa-concierge-bell"></i> Kelola Layanan
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-info w-100 text-white">
                            <i class="fas fa-users"></i> Kelola Petugas
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('admin.articles.index') }}" class="btn btn-warning w-100 text-white">
                            <i class="fas fa-newspaper"></i> Kelola Artikel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('bookingChart').getContext('2d');
        var chartData = @json($chartData ?? ['months' => [], 'counts' => []]);
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartData.months,
                datasets: [{
                    label: 'Jumlah Booking',
                    data: chartData.counts,
                    backgroundColor: 'rgba(102, 126, 234, 0.5)',
                    borderColor: 'rgba(102, 126, 234, 1)',
                    borderWidth: 2,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
@endsection