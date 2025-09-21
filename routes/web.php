<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/berita-backend', function () {
    return view('berita-backend');
});

Route::get('/Berita Desa', function () {
    return view('beritaDesa');
})->name('beritaDesa');

Route::get('/Berita', function () {
    return view('detailBerita');
})->name('detailBerita');

Route::get('/SOTK', function () {
    return view('SOTK');
})->name('SOTK');
