<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\PetugasDashboardController;
use App\Http\Controllers\AdminDashboardController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth routes
require __DIR__.'/auth.php';

// ==================== USER ROUTES ====================
Route::middleware(['auth', 'verified', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::resource('bookings', BookingController::class);
    Route::get('bookings/{booking}/track', [BookingController::class, 'track'])->name('bookings.track');
    Route::put('bookings/{booking}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

// ==================== PETUGAS ROUTES ====================
Route::middleware(['auth', 'verified', 'role:petugas'])->prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/dashboard', [PetugasDashboardController::class, 'index'])->name('dashboard');
    Route::get('/tasks', [BookingController::class, 'petugasTasks'])->name('tasks');
    Route::put('/tasks/{booking}/status', [BookingController::class, 'petugasUpdateStatus'])->name('update-status');
    Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
    Route::post('/attendances/checkin', [AttendanceController::class, 'checkIn'])->name('checkin');
    Route::post('/attendances/checkout', [AttendanceController::class, 'checkOut'])->name('checkout');
});

// ==================== ADMIN ROUTES ====================
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/bookings', [BookingController::class, 'adminIndex'])->name('bookings.index');
    Route::put('/bookings/{booking}/assign', [BookingController::class, 'assignPetugas'])->name('bookings.assign');
    Route::put('/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('bookings.status');
    
    Route::resource('services', ServiceController::class);
    Route::put('/services/{service}/toggle', [ServiceController::class, 'toggleActive'])->name('services.toggle');
    
    Route::resource('users', UserController::class);
    
    Route::get('/attendances/monitor', [AttendanceController::class, 'monitor'])->name('attendances.monitor');
    Route::get('/attendances/report', [AttendanceController::class, 'report'])->name('attendances.report');
    
    Route::get('/reports/revenue', [ReportController::class, 'revenue'])->name('reports.revenue');
    Route::get('/reports/attendance', [ReportController::class, 'attendance'])->name('reports.attendance');
    Route::get('/reports/bookings', [ReportController::class, 'bookings'])->name('reports.bookings');
    
    Route::resource('articles', ArticleController::class);
});

// ==================== PROFILE ROUTES ====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});