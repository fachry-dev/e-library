<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

use App\Http\Middleware\Authenticate;

//Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('home');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

//protected routes yang memerlukan authentikasi
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
    //daftar route untuk books
    Route::get('/books', [BooksController::class, 'index'])->name('books.index');

    //Penting : route /books/create harus ada diatas route books/{books}
    Route::middleware('admin')->group(function () {
        Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
        Route::post('/books', [BooksController::class, 'store'])->name('books.store');
        Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit');
        Route::put('/books/{book}', [BooksController::class, 'update'])->name('books.update');
        Route::delete('/books/{book}', [BooksController::class, 'destroy'])->name('books.destroy');
    });

    //letakan route show SETELAH route specific seperti create dan edit 
    Route::get('/books/{book}', [BooksController::class, 'show'])->name('books.show');
});

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Fallback route
Route::fallback(function () {
    return view('errors.404');
});
