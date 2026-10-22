<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Perbaikan huruf kapital pada 'Support'

class SuratMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('surat_masuks')->insert([
            [
                'nomor_surat' => '001/FT/x/2026',
                'tanggal'     => '2026-10-08',
                'pengirim'    => 'Fakultas Teknik',
                'perihal'     => 'Undangan Rapat',
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'nomor_surat' => '002/FT/x/2026',
                'tanggal'     => '2026-10-09',
                'pengirim'    => 'Rektorat',
                'perihal'     => 'Pengumuman Libur',
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'nomor_surat' => '003/FT/x/2026',
                'tanggal'     => '2026-10-10',
                'pengirim'    => 'Fakultas Hukum',
                'perihal'     => 'Undangan Reuni',
                'created_at'  => now(),
                'updated_at'  => now()
            ],
        ]);
    }
}