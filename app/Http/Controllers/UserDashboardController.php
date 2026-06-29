<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $totalBookings = Booking::where('user_id', $user->id)->count();
        $completedBookings = Booking::where('user_id', $user->id)->where('status', 'completed')->count();
        $inProgressBookings = Booking::where('user_id', $user->id)->where('status', 'in_progress')->count();
        $pendingBookings = Booking::where('user_id', $user->id)->where('status', 'pending')->count();
        $recentBookings = Booking::where('user_id', $user->id)->orderBy('created_at', 'desc')->limit(5)->get();
        
        return view('user.dashboard', compact(
            'totalBookings', 'completedBookings', 'inProgressBookings', 
            'pendingBookings', 'recentBookings'
        ));
    }
}