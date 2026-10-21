<?php

use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use Illuminate\Support\Facades\Route;

// Halaman utama diarahkan ke method dashboard di Controller
Route::get('/', [SuratMasukController::class, 'dashboard']);

// Halaman Daftar Tabel Surat Masuk
Route::get('/surat-masuk', [SuratMasukController::class, 'index']);

// Halaman Detail Surat Berdasarkan ID
Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show']);

Route::get('/surat-keluar', [SuratKeluarController::class, 'index']);
Route::get('/surat-keluar/{id}', [SuratKeluarController::class, 'show']);