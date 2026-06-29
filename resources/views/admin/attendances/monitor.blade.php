@extends('layouts.app')

@section('title', 'Monitor Absensi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-clipboard-check text-primary"></i> Monitor Absensi</h1>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Tanggal</label>
                <input type="date" name="date" class="form-control" value="{{ $date->format('Y-m-d') }}">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-search"></i> Filter
                </button>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <a href="{{ route('admin.attendances.monitor') }}" class="btn btn-secondary w-100">
                    <i class="fas fa-undo"></i> Reset
                </a>
            </div>
            <div class="col-md-4 d-flex align-items-end justify-content-end">
                <a href="{{ route('admin.attendances.report') }}" class="btn btn-success">
                    <i class="fas fa-file-alt"></i> Lihat Laporan
                </a>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body text-center">
                        <h5>Hadir</h5>
                        <h2>{{ $attendances->where('status', 'present')->count() }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body text-center">
                        <h5>Terlambat</h5>
                        <h2>{{ $attendances->where('status', 'late')->count() }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white">
                    <div class="card-body text-center">
                        <h5>Absen</h5>
                        <h2>{{ $attendances->where('status', 'absent')->count() }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body text-center">
                        <h5>Total Petugas</h5>
                        <h2>{{ $petugas->count() }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama Petugas</th>
                        <th>ID</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Status</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($petugas as $p)
                        @php
                            $attendance = $attendances->where('user_id', $p->id)->first();
                        @endphp
                        <tr>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->employee_id ?? '-' }}</td>
                            <td>{{ $attendance && $attendance->check_in_time ? \Carbon\Carbon::parse($attendance->check_in_time)->format('H:i') : '-' }}</td>
                            <td>{{ $attendance && $attendance->check_out_time ? \Carbon\Carbon::parse($attendance->check_out_time)->format('H:i') : '-' }}</td>
                            <td>
                                @if($attendance)
                                    <span class="badge bg-{{ $attendance->status == 'present' ? 'success' : ($attendance->status == 'late' ? 'warning' : 'danger') }}">
                                        {{ $attendance->status_text }}
                                    </span>
                                @else
                                    <span class="badge bg-secondary">Belum Check-in</span>
                                @endif
                            </td>
                            <td>
                                @if($attendance && $attendance->check_in_address)
                                    <small class="text-muted">{{ Str::limit($attendance->check_in_address, 30) }}</small>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection