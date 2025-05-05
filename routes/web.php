<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\Books\DashboardController;
use App\Http\Controllers\AuthController;


Route::get('/', [BooksController::class, 'index'])->name('dashboard.index');
Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');




