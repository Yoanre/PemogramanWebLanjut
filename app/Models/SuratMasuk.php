<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratMasuk extends Model
{
    protected $fillable = [
        'nomor_surat',
        'tanggal',
        'pengirim',
        'perihal',
        'keterangan',
        'category_id',
        'lampiran',
    ];

    // Setiap surat merujuk paling banyak satu kategori
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
