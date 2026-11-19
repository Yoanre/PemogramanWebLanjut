<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Aman dijalankan berulang: nama kategori tidak akan terduplikasi.
     */
    public function run(): void
    {
        foreach (['Undangan', 'Pemberitahuan', 'Permohonan'] as $nama) {
            DB::table('categories')->updateOrInsert(
                ['nama' => $nama],
                ['updated_at' => now(), 'created_at' => now()]
            );
        }
    }
}
