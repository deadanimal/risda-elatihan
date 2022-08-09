<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrePostTest extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['multiple'];

    public function multiple()
    {
        return $this->hasMany(JawapanMultiple::class, 'soalan_id', 'id');
    }

    public function kursus()
    {
        return $this->belongsTo(JadualKursus::class, 'id', 'jadual_kursus_id');
    }
}
