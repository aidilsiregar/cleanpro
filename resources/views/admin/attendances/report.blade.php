@extends('layouts.app')

@section('title', 'Laporan Absensi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-file-alt text-primary"></i> Laporan Absensi</h1>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" name="start_date" class="form-control" value="{{ $startDate->format('Y-m-d') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Tanggal Akhir</label>
                <input type="date" name="end_date" class="form-control" value="{{ $endDate->format('Y-m-d') }}">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-search"></i> Filter
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama Petugas</th>
                        <th>Total Hari</th>
                        <th>Hadir</th>
                        <th>Terlambat</th>
                        <th>Setengah Hari</th>
                        <th>Absen</th>
                        <th>Kehadiran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($summary as $data)
                        @php
                            $total = $data['total'] > 0 ? $data['total'] : 1;
                            $presentPercent = round(($data['present'] / $total) * 100);
                        @endphp
                        <tr>
                            <td>{{ $data['name'] }}</td>
                            <td>{{ $data['total'] }}</td>
                            <td class="text-success">{{ $data['present'] }}</td>
                            <td class="text-warning">{{ $data['late'] }}</td>
                            <td class="text-info">{{ $data['half_day'] }}</td>
                            <td class="text-danger">{{ $data['absent'] }}</td>
                            <td>
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar bg-success" role="progressbar" 
                                         style="width: {{ $presentPercent }}%">
                                        {{ $presentPercent }}%
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection