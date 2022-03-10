<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agensi extends Model
{
    use HasFactory;

    public function kategori()
    {
        return $this->belongsTo(KategoriAgensi::class, 'kategori_agensi', 'id');
    }
}
