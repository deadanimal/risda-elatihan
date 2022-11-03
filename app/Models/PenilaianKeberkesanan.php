<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianKeberkesanan extends Model
{
    use HasFactory;

    public function kehadiran()
    {
        return $this->belongsTo(Kehadiran::class, 'id', 'kehadiran_id');
    }
}
