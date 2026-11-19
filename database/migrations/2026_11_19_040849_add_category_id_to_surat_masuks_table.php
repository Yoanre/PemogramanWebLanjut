<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('surat_masuks', function (Blueprint $table) {
            // nullable: surat lama (P3-P5) tidak punya kategori
            // nullOnDelete: jika kategori dihapus, category_id menjadi NULL
            $table->foreignId('category_id')->nullable()
                ->constrained('categories')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('surat_masuks', function (Blueprint $table) {
            $table->dropConstrainedForeignId('category_id');
        });
    }
};
