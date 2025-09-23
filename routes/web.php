<?php

use App\Http\Controllers\AparatDesaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PotensiDesaController;
use App\Models\Galeri;
use Illuminate\Support\Facades\Route;


// Route Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{berita:slug_berita}', [BeritaController::class, 'show'])->name('berita.show');

// Route Sotk
Route::get('/sotk', [AparatDesaController::class, 'index'])->name('sotk');

// Route Galeri
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

// Route Potens Desa
Route::get('/potensi-desa', [PotensiDesaController::class, 'index'])->name('potensi');
Route::get('/potensi-desa/{potensi:slug}', [PotensiDesaController::class, 'show'])->name('potensi.show');

Route::get('/Berita', function () {
    return view('detailBerita');
})->name('detailBerita');

Route::get('/Potensi Desa', function () {
    return view('potensiDesa');
})->name('potensiDesa');

Route::get('/Potensi', function () {
    return view('detailPotensiDesa');
})->name('detailPotensiDesa');


Route::get('/Produk Desa', function () {
    return view('produkDesa');
})->name('produkDesa');

Route::get('/Produk', function () {
    return view('detailProduk');
})->name('detailProduk');

 Route::get('/Profile', function () {
    return view('profile');
})->name('profile');