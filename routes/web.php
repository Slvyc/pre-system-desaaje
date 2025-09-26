<?php

use App\Http\Controllers\AparatDesaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PotensiDesaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Galeri;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;


// Route Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route Pengaduan
Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

// Route Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{berita:slug_berita}', [BeritaController::class, 'show'])->name('berita.show');

// Route Sotk
Route::get('/sotk', [AparatDesaController::class, 'index'])->name('sotk');

// Route Galeri
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

// Route Potensi Desa
Route::get('/potensi-desa', [PotensiDesaController::class, 'index'])->name('potensi');
Route::get('/potensi-desa/{potensi:slug}', [PotensiDesaController::class, 'show'])->name('potensi.show');

// Route Produk Desa
Route::get('/produk-desa', [ProductController::class, 'index'])->name('produk');
Route::get('/produk-desa/{id}', [ProductController::class, 'show'])->name('produk.show');

//Route Profile Desa
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/Berita', function () {
    return view('detailBerita');
})->name('detailBerita');

Route::get('/Potensi Desa', function () {
    return view('potensiDesa');
})->name('potensiDesa');

Route::get('/Potensi', function () {
    return view('detailPotensiDesa');
})->name('detailPotensiDesa');

Route::get('/Produk', function () {
    return view('detailProduk');
})->name('detailProduk');

Route::get('/Geodata', function () {
    return view('geodata');
})->name('geodata');

Route::get('/infografis', function () {
    return view('infografis');
})->name('infografis');