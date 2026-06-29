@extends('layouts.app')

@section('title', 'Riwayat Absensi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-clipboard-list text-primary"></i> Riwayat Absensi</h1>
</div>

<div class="card">
    <div class="card-body">
        @if($attendances->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-clipboard fa-3x text-muted mb-3"></i>
                <h5>Belum Ada Riwayat Absensi</h5>
                <p class="text-muted">Mulai check-in untuk mencatat kehadiran Anda.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Status</th>
                            <th>Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendances as $attendance)
                            <tr>
                                <td>{{ $attendance->date->format('d M Y') }}</td>
                                <td>{{ $attendance->check_in_time ? \Carbon\Carbon::parse($attendance->check_in_time)->format('H:i') : '-' }}</td>
                                <td>{{ $attendance->check_out_time ? \Carbon\Carbon::parse($attendance->check_out_time)->format('H:i') : '-' }}</td>
                                <td>
                                    <span class="badge bg-{{ $attendance->status == 'present' ? 'success' : ($attendance->status == 'late' ? 'warning' : 'danger') }}">
                                        {{ $attendance->status_text }}
                                    </span>
                                </td>
                                <td>
                                    @if($attendance->check_in_address)
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
            {{ $attendances->links() }}
        @endif
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('petugas.dashboard') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>
@endsection