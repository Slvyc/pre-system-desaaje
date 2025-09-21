<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/berita-backend', function () {
    return view('berita-backend');
});
Route::get('/SOTK', function () {
    return view('SOTK');
})->name('SOTK');
