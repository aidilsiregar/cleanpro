@extends('layouts.app')

@section('title', 'Riwayat Booking')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-calendar-check text-primary"></i> Riwayat Booking</h1>
    <a href="{{ route('user.bookings.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Booking Baru
    </a>
</div>

@if($bookings->isEmpty())
    <div class="card">
        <div class="card-body text-center py-5">
            <i class="fas fa-calendar-plus fa-3x text-muted mb-3"></i>
            <h5>Belum Ada Booking</h5>
            <p class="text-muted">Mulai booking layanan cleaning sekarang!</p>
            <a href="{{ route('user.bookings.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Buat Booking
            </a>
        </div>
    </div>
@else
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Layanan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td><strong>{{ $booking->booking_code }}</strong></td>
                                <td>{{ $booking->service->name }}</td>
                                <td>{{ $booking->booking_date->format('d M Y') }} {{ $booking->booking_time }}</td>
                                <td>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge bg-{{ $booking->status_badge }}">
                                        {{ $booking->status_text }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('user.bookings.show', $booking) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if(in_array($booking->status, ['pending', 'assigned']))
                                        <form action="{{ route('user.bookings.cancel', $booking) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin membatalkan booking ini?')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $bookings->links() }}
        </div>
    </div>
@endif
@endsection