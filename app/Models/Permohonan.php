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
}
