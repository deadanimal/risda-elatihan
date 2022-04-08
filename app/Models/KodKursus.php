<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodKursus extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function jadual()
    {
        return $this->hasMany(JadualKursus::class, 'kod_kursus', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriKursus::class, 'U_Kategori_Kursus', 'id');
    }

    public function bidang()
    {
        return $this->belongsTo(BidangKursus::class, 'U_Bidang_Kursus', 'id');
    }

}
