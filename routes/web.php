<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RuangController;

Route::resource('ruang', RuangController::class);

Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/create', [BookingController::class, 'create'])->middleware('auth')->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::post('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
Route::post('/bookings/{id}/delete', [BookingController::class, 'destroy'])->name('bookings.destroy');

// Authentication routes
Route::get('/signin', [AuthController::class, 'showRegistrationForm'])->name('signin');
Route::post('/signin', [AuthController::class, 'signin']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
