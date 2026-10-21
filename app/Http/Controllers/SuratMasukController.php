<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    // Menyediakan data dummy agar bisa digunakan bersama
    private function getDataSurat()
    {
        return [
            [
                'id'          => 1,
                'nomor_surat' => '001/FT/x/2026',
                'tanggal'     => '08-10-2026',
                'pengirim'    => 'Fakultas Teknik',
                'perihal'     => 'Undangan Rapat',
            ],
            [
                'id'          => 2,
                'nomor_surat' => '002/FT/x/2026',
                'tanggal'     => '09-10-2026',
                'pengirim'    => 'Rektorat',
                'perihal'     => 'Pengumuman Libur',
            ],
            [
                'id'          => 3,
                'nomor_surat' => '003/FT/x/2026',
                'tanggal'     => '10-10-2026',
                'pengirim'    => 'Fakultas Hukum',
                'perihal'     => 'Undangan Reuni',
            ]
        ];
    }

    // Method untuk Halaman Dashboard (Ringkasan & Statistik)
    public function dashboard()
    {
        $suratMasuk = $this->getDataSurat();

        // Karena file dashboard.blade.php ada di dalam folder layouts/
        return view('layouts.dashboard', compact('suratMasuk'));
    }

    // Method untuk Halaman Tabel Data Surat Masuk
    public function index()
    {
        $suratMasuk = $this->getDataSurat();
        return view('surat-masuk.index', compact('suratMasuk'));
    }

    // Method untuk Detail Surat
    public function show($id)
    {
        $suratMasuk = $this->getDataSurat();
        $surat = collect($suratMasuk)->firstWhere('id', $id);

        if (!$surat) {
            abort(404, 'Surat tidak ditemukan');
        }

        return view('surat-masuk.show', compact('surat'));
    }
}
