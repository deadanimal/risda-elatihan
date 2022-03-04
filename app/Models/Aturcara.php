<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aturcara extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['jadual'];

    public function jadual()
    {
        return $this->belongsTo(JadualKursus::class, 'ac_jadual_kursus', 'id');
    }
}
