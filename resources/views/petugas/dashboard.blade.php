@extends('layouts.app')

@section('title', 'Dashboard Petugas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-chart-pie text-primary"></i> Dashboard Petugas</h1>
    <span class="badge bg-info fs-6">Selamat datang, {{ Auth::user()->name }}!</span>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card card-stats bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Tugas Hari Ini</h6>
                        <h2 class="text-white">{{ $todayTasks ?? 0 }}</h2>
                    </div>
                    <div class="stat-icon bg-white bg-opacity-25">
                        <i class="fas fa-tasks"></i>
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
                        <h2 class="text-white">{{ $completedTasks ?? 0 }}</h2>
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
                        <h2 class="text-white">{{ $inProgressTasks ?? 0 }}</h2>
                    </div>
                    <div class="stat-icon bg-white bg-opacity-25">
                        <i class="fas fa-spinner"></i>
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
                        <h6 class="text-white-50">Total Tugas</h6>
                        <h2 class="text-white">{{ $totalTasks ?? 0 }}</h2>
                    </div>
                    <div class="stat-icon bg-white bg-opacity-25">
                        <i class="fas fa-list"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5><i class="fas fa-tasks"></i> Tugas Hari Ini</h5>
                <a href="{{ route('petugas.tasks') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
            </div>
            <div class="card-body">
                @if(isset($todayTasksList) && $todayTasksList->isNotEmpty())
                    @foreach($todayTasksList as $task)
                        <div class="border-bottom pb-3 mb-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-1">{{ $task->service->name }}</h6>
                                    <small class="text-muted">
                                        <i class="far fa-calendar"></i> {{ $task->booking_date->format('d M Y') }}
                                        <i class="fas fa-clock ms-2"></i> {{ $task->booking_time }}
                                    </small>
                                    <br>
                                    <small class="text-muted">
                                        <i class="fas fa-user"></i> {{ $task->user->name }}
                                    </small>
                                    <br>
                                    <small class="text-muted">
                                        <i class="fas fa-map-marker-alt"></i> {{ Str::limit($task->address, 50) }}
                                    </small>
                                </div>
                                <div class="text-end">
                                    <span class="badge bg-{{ $task->status_badge }}">
                                        {{ $task->status_text }}
                                    </span>
                                    @if($task->status == 'assigned')
                                        <form action="{{ route('petugas.update-status', $task) }}" method="POST" class="mt-2">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="in_progress">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="fas fa-play"></i> Mulai
                                            </button>
                                        </form>
                                    @endif
                                    @if($task->status == 'in_progress')
                                        <form action="{{ route('petugas.update-status', $task) }}" method="POST" class="mt-2">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="completed">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="fas fa-check"></i> Selesai
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center text-muted">Tidak ada tugas hari ini</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-fingerprint"></i> Absensi</h5>
            </div>
            <div class="card-body">
                @if(isset($todayAttendance) && $todayAttendance)
                    <div class="alert alert-success">
                        <h6><i class="fas fa-check-circle"></i> Sudah Check-in</h6>
                        <hr>
                        <p class="mb-1"><strong>Check-in:</strong> {{ $todayAttendance->check_in_time ? \Carbon\Carbon::parse($todayAttendance->check_in_time)->format('H:i') : '-' }}</p>
                        <p class="mb-1"><strong>Check-out:</strong> {{ $todayAttendance->check_out_time ? \Carbon\Carbon::parse($todayAttendance->check_out_time)->format('H:i') : 'Belum check-out' }}</p>
                        <p class="mb-0"><strong>Status:</strong> 
                            <span class="badge bg-{{ $todayAttendance->status == 'present' ? 'success' : ($todayAttendance->status == 'late' ? 'warning' : 'danger') }}">
                                {{ $todayAttendance->status_text }}
                            </span>
                        </p>
                    </div>
                    @if(!$todayAttendance->check_out_time)
                        <form action="{{ route('petugas.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-sign-out-alt"></i> Check-out
                            </button>
                        </form>
                    @endif
                @else
                    <div class="text-center py-3">
                        <i class="fas fa-clock fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Belum check-in hari ini</p>
                    </div>
                    <form action="{{ route('petugas.checkin') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-sign-in-alt"></i> Check-in
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5><i class="fas fa-user"></i> Profil Petugas</h5>
            </div>
            <div class="card-body">
                <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                <p><strong>ID:</strong> {{ Auth::user()->employee_id ?? '-' }}</p>
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