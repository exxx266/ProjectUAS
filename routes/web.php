<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;

// RUTE UTAMA (HOME)
Route::get('/', function () {
    return view('welcome', [
        'layanans' => \App\Models\Layanan::all(),
        'kapsters' => \App\Models\Kapster::all(),
    ]);
}); 

// RUTE AUTENTIKASI PUBLIK (Hanya bisa diakses jika belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// RUTE KHUSUS ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login.post');
    
    // Rute yang hanya bisa diakses setelah login admin
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    });
});

// RUTE KHUSUS PENGGUNA LOGIN (Hanya bisa diakses jika sudah login)
Route::middleware('auth')->group(function () {
    // Autentikasi
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Fitur Reservasi / Booking
    Route::get('/booking/history', [BookingController::class, 'index'])->name('booking.history');
    Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
});

