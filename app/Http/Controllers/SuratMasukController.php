<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = [
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

        // Data ini nantinya akan dikirim ke view index.blade.php
        return view('surat-masuk.index', compact('suratMasuk'));
    }
    public function show($id)
    {
        // Daftar data dummy yang sama
        $suratMasuk = [
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

        // Cari surat berdasarkan ID
        $surat = collect($suratMasuk)->firstWhere('id', $id);

        // Jika data tidak ditemukan, tampilkan pesan error 404
        if (!$surat) {
            abort(404, 'Surat tidak ditemukan');
        }

        // Kirim data surat ke view show.blade.php
        return view('surat-masuk.show', compact('surat'));
    }
}
