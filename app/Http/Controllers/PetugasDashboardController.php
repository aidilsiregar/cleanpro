<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PetugasDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = Carbon::today();
        
        $todayTasks = Booking::where('petugas_id', $user->id)
            ->whereDate('booking_date', $today)
            ->count();
            
        $completedTasks = Booking::where('petugas_id', $user->id)
            ->where('status', 'completed')
            ->count();
            
        $inProgressTasks = Booking::where('petugas_id', $user->id)
            ->where('status', 'in_progress')
            ->count();
            
        $totalTasks = Booking::where('petugas_id', $user->id)->count();
        
        $todayTasksList = Booking::where('petugas_id', $user->id)
            ->whereDate('booking_date', $today)
            ->with(['service', 'user'])
            ->get();
            
        $todayAttendance = Attendance::where('user_id', $user->id)
            ->whereDate('date', $today)
            ->first();
        
        return view('petugas.dashboard', compact(
            'todayTasks', 'completedTasks', 'inProgressTasks', 
            'totalTasks', 'todayTasksList', 'todayAttendance'
        ));
    }
}