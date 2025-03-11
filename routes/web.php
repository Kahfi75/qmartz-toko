<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;



// Redirect root ke login jika belum login
Route::get('/', function () {
    return redirect()->route('login');
});

// Route untuk halaman login & autentikasi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('transaksi')->group(function () {
    Route::get('/pembelian', [TransaksiController::class, 'pembelian'])->name('transaksi.pembelian');
    Route::get('/penjualan', [TransaksiController::class, 'penjualan'])->name('transaksi.penjualan');
});

// Middleware untuk route yang membutuhkan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/kasir', function () {
        return view('kasir');
    })->name('kasir');

    // Resource route untuk Produk & Kategori (sudah mencakup semua operasi CRUD)
    Route::resource('produk', ProdukController::class);
    Route::resource('kategori', KategoriController::class);
    Route::post('/kategori/autofill', [KategoriController::class, 'autofill'])->name('kategori.autofill');
    Route::resource('penjualan', PenjualanController::class);
});
