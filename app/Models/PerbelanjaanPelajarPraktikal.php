<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbelanjaanPelajarPraktikal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pelajar()
    {
        return $this->hasOne(PelajarPraktikal::class, 'id', 'pelajar_praktikal_id');
    }
}
