@extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-chart-pie text-primary"></i> Dashboard User</h1>
    <span class="badge bg-success fs-6">Selamat datang, {{ Auth::user()->name }}!</span>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card card-stats bg-primary text-white">
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
        <div class="card card-stats bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Selesai</h6>
                        <h2 class="text-white">{{ $completedBookings ?? 0 }}</h2>
                    </div>
                    <div class="stat-icon bg-white bg-opacity-25">
                        <i class="fas fa-check-circle"></i>
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
                        <h6 class="text-white-50">Proses</h6>
                        <h2 class="text-white">{{ $inProgressBookings ?? 0 }}</h2>
                    </div>
                    <div class="stat-icon bg-white bg-opacity-25">
                        <i class="fas fa-spinner"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats bg-danger text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Menunggu</h6>
                        <h2 class="text-white">{{ $pendingBookings ?? 0 }}</h2>
                    </div>
                    <div class="stat-icon bg-white bg-opacity-25">
                        <i class="fas fa-clock"></i>
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
                <h5><i class="fas fa-history"></i> Riwayat Booking</h5>
            </div>
            <div class="card-body">
                @if(isset($recentBookings) && $recentBookings->isNotEmpty())
                    <div class="list-group">
                        @foreach($recentBookings as $booking)
                            <a href="{{ route('user.bookings.show', $booking) }}" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <div>
                                        <h6 class="mb-1">{{ $booking->service->name }}</h6>
                                        <small class="text-muted">
                                            <i class="far fa-calendar"></i> {{ $booking->booking_date->format('d M Y') }}
                                            <i class="fas fa-clock ms-2"></i> {{ $booking->booking_time }}
                                        </small>
                                    </div>
                                    <span class="badge bg-{{ $booking->status_badge }}">
                                        {{ $booking->status_text }}
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="mt-3 text-center">
                        <a href="{{ route('user.bookings.index') }}" class="btn btn-outline-primary">
                            Lihat Semua Booking
                        </a>
                    </div>
                @else
                    <p class="text-center text-muted">Belum ada booking</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-plus-circle"></i> Buat Booking</h5>
            </div>
            <div class="card-body">
                <p>Pilih layanan dan jadwal yang Anda inginkan</p>
                <a href="{{ route('user.bookings.create') }}" class="btn btn-primary w-100">
                    <i class="fas fa-calendar-plus"></i> Booking Sekarang
                </a>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h5><i class="fas fa-user"></i> Profil Saya</h5>
            </div>
            <div class="card-body">
                <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Telepon:</strong> {{ Auth::user()->phone ?? '-' }}</p>
                <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary w-100">
                    <i class="fas fa-edit"></i> Edit Profil
                </a>
            </div>
        </div>
    </div>
</div>
@endsection