<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianPeserta extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kursus()
    {
        return $this->belongsTo(JadualKursus::class, 'id_jadual', 'id');
    }

    public function peserta()
    {
        return $this->belongsTo(User::class, 'nama_peserta', 'name');
    }
}
