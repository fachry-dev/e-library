<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\Auth\RegisteredUserController;



//Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class,'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class,'login']);
    Route::get('/register', [AuthController::class,'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class,'register']);

});


Route::post('/logout', [AuthController::class,'logout'])->name('logout')->middleware('auth');

//protected routes yang memerlukan authentikasi
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('books', BooksController::class);

    //daftar route untuk books
    Route::get('/books', [BooksController::class,'index'])->name('books.index');

    //Penting : route /books/create harus ada diatas route books/{books}
    Route::middleware('amin')->group(function () {
        Route::get('/books/create', [BooksController::class,'create'])->name('books.create');
        Route::post('/books', [BooksController::class,'store'])->name('books.store');
        Route::get('/books/{books}/edit', [BooksController::class,'edit'])->name('books.edit');
        Route::put('/books/{books}', [BooksController::class,'update'])->name('books.update');
        Route::delete('/books/{books}', [BooksController::class,'destroy'])->name('books.destroy');
    });

    //letakan route show SETELAH route specific seperti create dan edit 
    Route::get('/books/{books}', [BooksController::class,'show'])->name('books.show');
    
});

Route::redirect('/', ' /dashboard');

// Fallback route
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});