<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Attendance;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function revenue(Request $request)
    {
        $startDate = $request->start_date ? Carbon::parse($request->start_date) : Carbon::now()->startOfMonth();
        $endDate = $request->end_date ? Carbon::parse($request->end_date) : Carbon::now()->endOfMonth();

        $bookings = Booking::with(['service', 'user', 'petugas'])
            ->whereBetween('booking_date', [$startDate, $endDate])
            ->where('status', 'completed')
            ->get();

        $totalRevenue = $bookings->sum('total_price');
        $totalOrders = $bookings->count();
        $averagePrice = $totalOrders > 0 ? $totalRevenue / $totalOrders : 0;

        $serviceStats = $bookings->groupBy('service_id')->map(function($items) {
            return [
                'name' => $items->first()->service->name,
                'count' => $items->count(),
                'revenue' => $items->sum('total_price')
            ];
        });

        $pdf = Pdf::loadView('admin.reports.revenue', compact(
            'bookings', 'totalRevenue', 'totalOrders', 'averagePrice', 
            'serviceStats', 'startDate', 'endDate'
        ));

        return $pdf->download('laporan-revenue-' . Carbon::now()->format('Y-m-d') . '.pdf');
    }

    public function attendance(Request $request)
    {
        $startDate = $request->start_date ? Carbon::parse($request->start_date) : Carbon::now()->startOfMonth();
        $endDate = $request->end_date ? Carbon::parse($request->end_date) : Carbon::now()->endOfMonth();

        $attendances = Attendance::with('user')
            ->whereBetween('date', [$startDate, $endDate])
            ->get();

        $summary = [];
        $petugas = User::role('petugas')->get();
        
        foreach ($petugas as $p) {
            $userAttendances = $attendances->where('user_id', $p->id);
            $summary[$p->id] = [
                'name' => $p->name,
                'total_days' => $userAttendances->count(),
                'present' => $userAttendances->where('status', 'present')->count(),
                'late' => $userAttendances->where('status', 'late')->count(),
                'half_day' => $userAttendances->where('status', 'half_day')->count(),
                'absent' => $userAttendances->where('status', 'absent')->count()
            ];
        }

        $pdf = Pdf::loadView('admin.reports.attendance', compact(
            'summary', 'startDate', 'endDate'
        ));

        return $pdf->download('laporan-absensi-' . Carbon::now()->format('Y-m-d') . '.pdf');
    }

    public function bookings(Request $request)
    {
        $startDate = $request->start_date ? Carbon::parse($request->start_date) : Carbon::now()->startOfMonth();
        $endDate = $request->end_date ? Carbon::parse($request->end_date) : Carbon::now()->endOfMonth();

        $bookings = Booking::with(['service', 'user', 'petugas'])
            ->whereBetween('booking_date', [$startDate, $endDate])
            ->get();

        $pdf = Pdf::loadView('admin.reports.bookings', compact(
            'bookings', 'startDate', 'endDate'
        ));

        return $pdf->download('laporan-booking-' . Carbon::now()->format('Y-m-d') . '.pdf');
    }
}