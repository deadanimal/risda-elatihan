<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parlimen extends Model
{
    use HasFactory;

    public function negeri()
    {
        return $this->belongsTo(Negeri::class, 'U_Negeri_ID', 'U_Negeri_ID');
    }
}
