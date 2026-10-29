<?php

use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use Illuminate\Support\Facades\Route;

// Halaman utama / Dashboard
Route::get('/', [SuratMasukController::class, 'dashboard'])->name('dashboard');

// Resource Route untuk Surat Masuk (menggantikan route index dan show yang lama)
Route::resource('surat-masuk', SuratMasukController::class)
    ->parameters(['surat-masuk' => 'id']);

// Route Surat Keluar yang sudah ada sebelumnya tetap dibiarkan
Route::get('/surat-keluar', [SuratKeluarController::class, 'index']);
Route::get('/surat-keluar/{id}', [SuratKeluarController::class, 'show']);