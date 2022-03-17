<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenceramahKonsultan extends Model
{
    protected $guarded = ['id'];
    protected $with = ['jadual_kursus'];

    public function agensi()
    {
        return $this->hasOne(Agensi::class, 'id', 'pc_id');
    }

    public function jadual_kursus()
    {
        return $this->belongsTo(JadualKursus::class, 'pc_jadual_kursus', 'id');
    }
}
