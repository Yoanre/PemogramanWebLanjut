<?php

use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route utama untuk menampilkan daftar surat masuk
Route::get('/surat-masuk', [SuratMasukController::class, 'index']);

// Route dengan parameter {id} untuk menampilkan detail surat masuk
Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show']);