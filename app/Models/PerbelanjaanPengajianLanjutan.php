<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbelanjaanPengajianLanjutan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pengajian_lanjutan()
    {
        return $this->hasOne(PengajianLanjutan::class, 'id', 'pengguna_id');
    }

    public function pengguna()
    {
        return $this->hasOneThrough(
            User::class,
            PengajianLanjutan::class,
            'id',
            'id',
            'pengguna_id',
            'staf'
        );
    }
}
