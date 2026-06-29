<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Service;
use App\Models\Attendance;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalRevenue = Booking::where('status', 'completed')->sum('total_price');
        $totalBookings = Booking::count();
        $totalPetugas = User::role('petugas')->count();
        $totalServices = Service::count();
        
        $presentToday = Attendance::whereDate('date', Carbon::today())
            ->where('status', 'present')
            ->count();
            
        // Chart data
        $chartData = $this->getChartData();
        
        return view('admin.dashboard', compact(
            'totalRevenue', 'totalBookings', 'totalPetugas', 
            'totalServices', 'presentToday', 'chartData'
        ));
    }
    
    private function getChartData()
    {
        $months = [];
        $counts = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->format('M');
            $counts[] = Booking::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
        }
        
        return [
            'months' => $months,
            'counts' => $counts
        ];
    }
}