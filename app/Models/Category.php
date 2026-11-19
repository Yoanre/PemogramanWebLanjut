<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['nama'];

    // Satu kategori dapat dipakai banyak surat masuk
    public function suratMasuk(): HasMany
    {
        return $this->hasMany(SuratMasuk::class);
    }

    // ...dan banyak surat keluar
    public function suratKeluar(): HasMany
    {
        return $this->hasMany(SuratKeluar::class);
    }
}
