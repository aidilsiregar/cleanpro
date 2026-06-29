<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    // ==================== USER METHODS ====================
    
    public function index()
    {
        $bookings = Booking::with(['service', 'petugas'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('user.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $services = Service::where('is_active', true)->get();
        return view('user.bookings.create', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required',
            'address' => 'required|string|max:500',
            'notes' => 'nullable|string|max:500'
        ]);

        $service = Service::findOrFail($validated['service_id']);

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'service_id' => $validated['service_id'],
            'booking_date' => $validated['booking_date'],
            'booking_time' => $validated['booking_time'],
            'address' => $validated['address'],
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
            'total_price' => $service->price
        ]);

        return redirect()->route('user.bookings.show', $booking)
            ->with('success', 'Booking berhasil dibuat! Kode: ' . $booking->booking_code);
    }

    public function show(Booking $booking)
    {
        if ($booking->user_id != Auth::id() && !Auth::user()->hasRole('admin')) {
            abort(403);
        }
        
        $booking->load(['service', 'petugas', 'review']);
        return view('user.bookings.show', compact('booking'));
    }

    public function cancel(Booking $booking)
    {
        if ($booking->user_id != Auth::id()) {
            abort(403);
        }
        
        if (in_array($booking->status, ['pending', 'assigned'])) {
            $booking->update(['status' => 'cancelled']);
            return redirect()->back()->with('success', 'Booking berhasil dibatalkan');
        }
        
        return redirect()->back()->with('error', 'Booking tidak dapat dibatalkan');
    }

    public function track(Booking $booking)
    {
        if ($booking->user_id != Auth::id()) {
            abort(403);
        }
        return view('user.bookings.track', compact('booking'));
    }

    // ==================== ADMIN METHODS ====================
    
    public function adminIndex(Request $request)
    {
        $query = Booking::with(['user', 'service', 'petugas']);
        
        if ($request->status) {
            $query->where('status', $request->status);
        }
        
        if ($request->search) {
            $query->where('booking_code', 'like', '%' . $request->search . '%')
                  ->orWhereHas('user', function($q) use ($request) {
                      $q->where('name', 'like', '%' . $request->search . '%');
                  });
        }
        
        $bookings = $query->orderBy('created_at', 'desc')->paginate(15);
        $petugas = User::role('petugas')->get();
        
        return view('admin.bookings.index', compact('bookings', 'petugas'));
    }

    public function assignPetugas(Request $request, Booking $booking)
    {
        $request->validate([
            'petugas_id' => 'required|exists:users,id'
        ]);

        $petugas = User::findOrFail($request->petugas_id);
        
        if (!$petugas->hasRole('petugas')) {
            return redirect()->back()->with('error', 'User tersebut bukan petugas');
        }

        $booking->update([
            'petugas_id' => $request->petugas_id,
            'status' => 'assigned'
        ]);

        return redirect()->back()->with('success', 'Petugas berhasil diassign ke booking ' . $booking->booking_code);
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,assigned,in_progress,completed,cancelled'
        ]);

        $booking->update(['status' => $request->status]);
        
        if ($request->status == 'in_progress') {
            $booking->update(['started_at' => Carbon::now()]);
        }
        
        if ($request->status == 'completed') {
            $booking->update(['completed_at' => Carbon::now()]);
        }

        return redirect()->back()->with('success', 'Status berhasil diupdate');
    }

    // ==================== PETUGAS METHODS ====================
    
    public function petugasTasks()
    {
        $tasks = Booking::with(['service', 'user'])
            ->where('petugas_id', Auth::id())
            ->orderBy('booking_date')
            ->orderBy('booking_time')
            ->paginate(10);
            
        return view('petugas.tasks.index', compact('tasks'));
    }

    public function petugasUpdateStatus(Request $request, Booking $booking)
    {
        if ($booking->petugas_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:in_progress,completed'
        ]);

        $booking->update(['status' => $request->status]);
        
        if ($request->status == 'in_progress') {
            $booking->update(['started_at' => Carbon::now()]);
        }
        
        if ($request->status == 'completed') {
            $booking->update(['completed_at' => Carbon::now()]);
        }

        return redirect()->back()->with('success', 'Status tugas berhasil diupdate');
    }
}