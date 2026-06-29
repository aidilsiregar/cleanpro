<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Article;
use App\Models\Review;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->limit(6)->get();
        $articles = Article::where('is_published', true)->limit(3)->get();
        $reviews = Review::with('user')->limit(6)->get();
        
        // Statistik
        $totalServices = Service::where('is_active', true)->count();
        $totalCustomers = User::role('user')->count();
        $totalBookings = Booking::count();
        $totalPetugas = User::role('petugas')->count();
        
        // Testimoni rating rata-rata
        $avgRating = Review::avg('rating') ?? 0;
        
        return view('home', compact(
            'services', 
            'articles', 
            'reviews',
            'totalServices',
            'totalCustomers',
            'totalBookings',
            'totalPetugas',
            'avgRating'
        ));
    }
}