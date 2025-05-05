<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Books\DashboardController;

// Halaman Utama (Daftar Buku)
Route::get('/', [BooksController::class, 'index'])->name('home');
Route::get('/buku', [BooksController::class, 'index'])->name('buku.index'); // Anda bisa memilih salah satu dari '/' atau '/buku'

// Rute untuk Autentikasi
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Rute untuk Dashboard (jika ada halaman dashboard terpisah)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

// Rute Resource untuk Buku (CRUD operations)
Route::resource('books', BooksController::class)->middleware('auth'); // Tambahkan middleware 'auth' jika perlu autentikasi