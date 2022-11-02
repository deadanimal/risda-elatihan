<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatlamatTahunanPeserta extends Model
{
    use HasFactory;

    public function bidang()
    {
        return $this->belongsTo(BidangKursus::class, 'bidang_ref', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriKursus::class, 'kategori_ref', 'id');
    }

    public function tajuk()
    {
        return $this->belongsTo(KodKursus::class, 'tajuk_ref', 'id');
    }
}
