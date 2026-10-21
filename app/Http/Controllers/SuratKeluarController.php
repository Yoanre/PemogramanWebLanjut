<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    // Fungsi privat untuk menampung data dummy surat keluar
    private function getDataSuratKeluar()
    {
        return [
            [
                'id'          => 1,
                'nomor_surat' => 'SK-001/X/2026',
                'tanggal'     => '12-10-2026',
                'tujuan'      => 'Universitas Lain',
                'perihal'     => 'Nota Kesepahaman Kerjasama',
            ],
            [
                'id'          => 2,
                'nomor_surat' => 'SK-002/X/2026',
                'tanggal'     => '14-10-2026',
                'tujuan'      => 'Dinas Pendidikan',
                'perihal'     => 'Laporan Kegiatan Kampus',
            ],
        ];
    }

    // Method untuk menampilkan daftar surat keluar
    public function index()
    {
        $suratKeluar = $this->getDataSuratKeluar();
        return view('surat-keluar.index', compact('suratKeluar'));
    }

    // Method untuk menampilkan detail surat keluar berdasarkan ID
    public function show($id)
    {
        $suratKeluar = $this->getDataSuratKeluar();
        $surat = collect($suratKeluar)->firstWhere('id', $id);

        if (!$surat) {
            abort(404, 'Surat keluar tidak ditemukan');
        }

        return view('surat-keluar.show', compact('surat'));
    }
}