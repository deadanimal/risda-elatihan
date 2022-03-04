<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadualKursus extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kehadiran', 'penceramah', 'preposttest', 'kodkursus'];

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class);
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

    public function posttest()
    {
        return $this->hasMany(PostTest::class);
    }

}
