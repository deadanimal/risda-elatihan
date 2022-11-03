<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seksyen extends Model
{
    use HasFactory;

    public function negeri()
    {
        return $this->belongsTo(Negeri::class, 'U_Negeri_ID', 'U_Negeri_ID');
    }

    public function daerah()
    {
        return $this->belongsTo(Daerah::class, 'U_Daerah_ID', 'U_Daerah_ID');
    }

    public function mukim()
    {
        return $this->belongsTo(Mukim::class, 'U_Mukim_ID', 'U_Mukim_ID');
    }
}
