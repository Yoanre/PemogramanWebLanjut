<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar; // Panggil Model SuratKeluar

class SuratKeluarController extends Controller
{
    // Method untuk menampilkan daftar surat keluar dari database
    public function index()
    {
        $suratKeluar = SuratKeluar::all();
        return view('surat-keluar.index', compact('suratKeluar'));
    }

    // Method untuk menampilkan detail surat keluar berdasarkan ID dari database
    public function show($id)
    {
        $surat = SuratKeluar::find($id);

        if (!$surat) {
            abort(404, 'Surat keluar tidak ditemukan');
        }

        return view('surat-keluar.show', compact('surat'));
    }
}