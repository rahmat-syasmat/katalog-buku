
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// Halaman publik
Route::get('/', [BookController::class, 'index'])
    ->name('home');

Route::get('/books', [BookController::class, 'index'])
    ->name('books.index');

Route::get('/books/{id}', [BookController::class, 'show'])
    ->name('books.show');

// Login admin
Route::middleware('guest')->group(function () {

    Route::get('/admin/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/admin/login', [AuthController::class, 'login'])
        ->name('login.process');

});

// Halaman khusus admin
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/admin/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Tambah buku
    Route::get('/admin/books/create', [BookController::class, 'create'])
        ->name('books.create');

    Route::post('/admin/books', [BookController::class, 'store'])
        ->name('books.store');

    // Edit buku
    Route::get('/admin/books/{id}/edit', [BookController::class, 'edit'])
        ->name('books.edit');

    Route::put('/admin/books/{id}', [BookController::class, 'update'])
        ->name('books.update');

    // Hapus buku
    Route::delete('/admin/books/{id}', [BookController::class, 'destroy'])
        ->name('books.destroy');

});
