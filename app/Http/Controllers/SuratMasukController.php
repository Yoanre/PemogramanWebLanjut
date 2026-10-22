<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk; // 1. Panggil Model SuratMasuk di atas

class SuratMasukController extends Controller
{
    // Method untuk Halaman Dashboard (Statistik)
    public function dashboard()
    {
        // Mengambil seluruh data dari database tabel surat_masuks
        $suratMasuk = SuratMasuk::all(); 
        return view('layouts.dashboard', compact('suratMasuk'));
    }

    // Method untuk Halaman Tabel Data Surat Masuk
    public function index()
    {
        // Mengambil seluruh data dari database
        $suratMasuk = SuratMasuk::all(); 
        return view('surat-masuk.index', compact('suratMasuk'));
    }

    // Method untuk Detail Surat Berdasarkan ID
    public function show($id)
    {
        // Mencari data berdasarkan ID di database
        $surat = SuratMasuk::find($id);

        // Jika data tidak ditemukan, tampilkan error 404
        if (!$surat) {
            abort(404, 'Surat tidak ditemukan');
        }

        return view('surat-masuk.show', compact('surat'));
    }
}