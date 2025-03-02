<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;

// Route untuk halaman login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk dashboard, hanya bisa diakses jika sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Redirect root ke login jika belum login
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/kasir', function () {
    return view('kasir');
})->name('kasir');


Route::resource('produk', ProdukController::class);