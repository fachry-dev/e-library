<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Auth routes - accessible to guests
Route::middleware('guest')->group(function () {
    // Landing page
    Route::get('/', function () {
        return view('auth.index');
    })->name('auth.index');
    
    // Login routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    // Registration routes
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Auth protected routes
Route::middleware('auth')->group(function () {
    // Logout route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Book routes
    Route::resource('books', BooksController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
    // Admin only routes
    Route::middleware('admin')->group(function () {
        // Admin specific routes can go here
    });
});