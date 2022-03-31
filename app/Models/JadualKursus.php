<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadualKursus extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $with = ['preposttest', 'tempat', 'status_pelaksanaan', 'kodkursus'];

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class);
    }
    public function aturcara()
    {
        return $this->hasMany(Aturcara::class, 'ac_jadual_kursus');
    }
    public function kodkursus()
    {
        return $this->hasOne(KodKursus::class, 'id', 'kod_kursus');
    }

    public function penceramah()
    {
        return $this->hasMany(PenceramahKonsultan::class, 'pc_jadual_kursus');
    }

    public function preposttest()
    {
        return $this->hasMany(PrePostTest::class);
    }
    public function tempat()
    {
        return $this->belongsTo(Agensi::class, 'kursus_tempat', 'id');
    }
    public function status_pelaksanaan()
    {
        return $this->belongsTo(StatusPelaksanaan::class, 'kursus_status_pelaksanaan', 'id');
    }
    public function posttest()
    {
        return $this->hasMany(PostTest::class);
    }

    public function pengendali()
    {
        return $this->belongsTo(Agensi::class, 'kursus_pengendali_latihan', 'id');
    }

    public function pemohon()
    {
        return $this->hasMany(Permohonan::class, 'kod_kursus', 'id');
    }

}
