<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('surat_keluars')->insert([
            [
                'nomor_surat' => 'SK-001/X/2026',
                'tanggal'     => '2026-10-12',
                'tujuan'      => 'Universitas Lain',
                'perihal'     => 'Nota Kesepahaman Kerjasama',
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'nomor_surat' => 'SK-002/X/2026',
                'tanggal'     => '2026-10-14',
                'tujuan'      => 'Dinas Pendidikan',
                'perihal'     => 'Laporan Kegiatan Kampus',
                'created_at'  => now(),
                'updated_at'  => now()
            ],
        ]);
    }
}