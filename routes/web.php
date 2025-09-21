<?php

use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/berita-backend', function () {
    return view('berita-backend');
});

Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{berita:slug_berita}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/Berita', function () {
    return view('detailBerita');
})->name('detailBerita');

Route::get('/sotk', function () {
    return view('sotk');
})->name('sotk');

Route::get('/Potensi Desa', function () {
    return view('potensiDesa');
})->name('potensiDesa');

Route::get('/Potensi', function () {
    return view('detailPotensiDesa');
})->name('detailPotensiDesa');
