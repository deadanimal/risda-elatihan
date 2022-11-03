<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dun extends Model
{
    use HasFactory;

    public function negeri()
    {
        return $this->hasOne(Negeri::class, 'U_Negeri_ID', 'Kod_Negeri');
    }

    public function parlimen()
    {
        return $this->hasOne(Parlimen::class, 'U_Parlimen_ID', 'U_Parlimen_ID');
    }
}
