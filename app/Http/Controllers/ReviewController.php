<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500'
        ]);

        $booking = Booking::findOrFail($validated['booking_id']);
        
        // Check if booking belongs to user
        if ($booking->user_id != Auth::id()) {
            abort(403);
        }
        
        // Check if booking is completed
        if ($booking->status != 'completed') {
            return redirect()->back()->with('error', 'Booking harus selesai sebelum memberi review');
        }

        // Check if review already exists
        $existing = Review::where('booking_id', $validated['booking_id'])->first();
        if ($existing) {
            return redirect()->back()->with('error', 'Anda sudah memberi review untuk booking ini');
        }

        Review::create([
            'user_id' => Auth::id(),
            'booking_id' => $validated['booking_id'],
            'rating' => $validated['rating'],
            'comment' => $validated['comment']
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas review Anda!');
    }
}