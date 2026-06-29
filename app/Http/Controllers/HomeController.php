<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Article;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->limit(6)->get();
        $articles = Article::where('is_published', true)->limit(3)->get();
        $reviews = Review::with('user')->limit(6)->get();
        
        return view('home', compact('services', 'articles', 'reviews'));
    }
}