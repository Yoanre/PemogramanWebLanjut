<?php

use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use Illuminate\Support\Facades\Route;

// Halaman utama / Dashboard
Route::get('/', [SuratMasukController::class, 'dashboard'])->name('dashboard');

// Resource Route untuk Surat Masuk (menggantikan route index dan show yang lama)
Route::resource('surat-masuk', SuratMasukController::class)
    ->parameters(['surat-masuk' => 'id']);

// Resource Route untuk Surat Keluar (menggantikan route index dan show manual yang lama)
Route::resource('surat-keluar', SuratKeluarController::class)
    ->parameters(['surat-keluar' => 'id']);
