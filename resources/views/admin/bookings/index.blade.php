@extends('layouts.app')

@section('title', 'Kelola Booking')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-calendar-check text-primary"></i> Kelola Booking</h1>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari kode atau pelanggan..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">Semua Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
                    <option value="assigned" {{ request('status') == 'assigned' ? 'selected' : '' }}>Ditugaskan</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>Proses</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-search"></i> Filter
                </button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary w-100">
                    <i class="fas fa-undo"></i> Reset
                </a>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($bookings->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-calendar-check fa-3x text-muted mb-3"></i>
                <h5>Tidak Ada Booking</h5>
                <p class="text-muted">Belum ada booking yang masuk.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Pelanggan</th>
                            <th>Layanan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Petugas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td><strong>{{ $booking->booking_code }}</strong></td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->service->name }}</td>
                                <td>{{ $booking->booking_date->format('d M Y') }}</td>
                                <td>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge bg-{{ $booking->status_badge }}">
                                        {{ $booking->status_text }}
                                    </span>
                                </td>
                                <td>
                                    @if($booking->petugas)
                                        {{ $booking->petugas->name }}
                                    @else
                                        <span class="text-muted">Belum diassign</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#assignModal{{ $booking->id }}">
                                        <i class="fas fa-user-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#statusModal{{ $booking->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $bookings->links() }}
        @endif
    </div>
</div>

@foreach($bookings as $booking)
    <!-- Assign Modal -->
    <div class="modal fade" id="assignModal{{ $booking->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.bookings.assign', $booking) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Assign Petugas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Booking:</strong> {{ $booking->booking_code }}</p>
                        <div class="mb-3">
                            <label class="form-label">Pilih Petugas</label>
                            <select name="petugas_id" class="form-select" required>
                                <option value="">-- Pilih Petugas --</option>
                                @foreach($petugas as $p)
                                    <option value="{{ $p->id }}" {{ $booking->petugas_id == $p->id ? 'selected' : '' }}>
                                        {{ $p->name }} ({{ $p->employee_id ?? '-' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Status Modal -->
    <div class="modal fade" id="statusModal{{ $booking->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.bookings.status', $booking) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Update Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Booking:</strong> {{ $booking->booking_code }}</p>
                        <p><strong>Status Saat Ini:</strong> 
                            <span class="badge bg-{{ $booking->status_badge }}">{{ $booking->status_text }}</span>
                        </p>
                        <div class="mb-3">
                            <label class="form-label">Status Baru</label>
                            <select name="status" class="form-select" required>
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                <option value="assigned" {{ $booking->status == 'assigned' ? 'selected' : '' }}>Ditugaskan</option>
                                <option value="in_progress" {{ $booking->status == 'in_progress' ? 'selected' : '' }}>Proses</option>
                                <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                                <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection