<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $with = ['jadual'];

    public function kodkursus()
    {
        return $this->belongsTo(KodKursus::class, 'kod_Kursus', 'kod_kursus');
    }

    public function jadual()
    {
        return $this->belongsTo(JadualKursus::class, 'kod_kursus', 'id');
    }

    public function peserta()
    {
        return $this->belongsTo(User::class, 'no_pekerja', 'id');
    }

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class, 'jadual_kursus_id', 'kod_kursus');
    }

    public function data_staf()
    {
        return $this->hasOneThrough(
            Staf::class,
            User::class,
            'id',
            'id_Pengguna',
            'no_pekerja',
            'id'
        );
    }

    public function data_pk()
    {
        return $this->hasOneThrough(
            PekebunKecil::class,
            User::class,
            'id',
            'id_Pengguna',
            'no_pekerja',
            'id'
        );
    }

    public function tempat()
    {
        return $this->hasOneThrough(
            Agensi::class,
            JadualKursus::class,
            'id',
            'id',
            'kod_kursus',
            'kursus_tempat'
        );
    }
}
