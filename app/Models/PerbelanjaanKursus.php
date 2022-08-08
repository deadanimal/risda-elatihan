<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbelanjaanKursus extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jadual_kursus()
    {
        return $this->belongsTo(JadualKursus::class, 'id', 'jadualkursus_id');
    }

    public function pt()
    {
        return $this->belongsTo(PusatTanggungjawab::class, 'Kod_PT', 'kod_PT');
    }
}
