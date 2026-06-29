<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    // ==================== PETUGAS METHODS ====================
    
    public function index()
    {
        $attendances = Attendance::where('user_id', Auth::id())
            ->orderBy('date', 'desc')
            ->paginate(15);
        return view('petugas.attendances.index', compact('attendances'));
    }

    public function checkIn(Request $request)
    {
        $request->validate([
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'address' => 'nullable|string'
        ]);

        $today = Carbon::today();
        $now = Carbon::now();

        $existing = Attendance::where('user_id', Auth::id())
            ->where('date', $today)
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Anda sudah check-in hari ini');
        }

        // Check if late (after 08:00)
        $status = 'present';
        if ($now->format('H:i') > '08:00') {
            $status = 'late';
        }

        Attendance::create([
            'user_id' => Auth::id(),
            'date' => $today,
            'check_in_time' => $now,
            'check_in_lat' => $request->latitude,
            'check_in_lng' => $request->longitude,
            'check_in_address' => $request->address,
            'status' => $status
        ]);

        return redirect()->back()->with('success', 'Check-in berhasil dilakukan');
    }

    public function checkOut(Request $request)
    {
        $request->validate([
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'address' => 'nullable|string'
        ]);

        $today = Carbon::today();

        $attendance = Attendance::where('user_id', Auth::id())
            ->where('date', $today)
            ->first();

        if (!$attendance) {
            return redirect()->back()->with('error', 'Anda belum check-in');
        }

        if ($attendance->check_out_time) {
            return redirect()->back()->with('error', 'Anda sudah check-out');
        }

        $attendance->update([
            'check_out_time' => Carbon::now(),
            'check_out_lat' => $request->latitude,
            'check_out_lng' => $request->longitude,
            'check_out_address' => $request->address
        ]);

        return redirect()->back()->with('success', 'Check-out berhasil dilakukan');
    }

    // ==================== ADMIN METHODS ====================
    
    public function monitor(Request $request)
    {
        $date = $request->date ? Carbon::parse($request->date) : Carbon::today();
        
        $attendances = Attendance::with('user')
            ->whereDate('date', $date)
            ->get();
            
        $petugas = User::role('petugas')->get();
        
        return view('admin.attendances.monitor', compact('attendances', 'petugas', 'date'));
    }

    public function report(Request $request)
    {
        $startDate = $request->start_date ? Carbon::parse($request->start_date) : Carbon::now()->startOfMonth();
        $endDate = $request->end_date ? Carbon::parse($request->end_date) : Carbon::now()->endOfMonth();

        $attendances = Attendance::with('user')
            ->whereBetween('date', [$startDate, $endDate])
            ->get()
            ->groupBy('user_id');

        $summary = [];
        foreach ($attendances as $userId => $items) {
            $user = $items->first()->user;
            $summary[$userId] = [
                'name' => $user->name,
                'total' => $items->count(),
                'present' => $items->where('status', 'present')->count(),
                'late' => $items->where('status', 'late')->count(),
                'half_day' => $items->where('status', 'half_day')->count(),
                'absent' => $items->where('status', 'absent')->count()
            ];
        }

        return view('admin.attendances.report', compact('summary', 'startDate', 'endDate'));
    }
}