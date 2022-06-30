<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PusatTanggungjawab extends Model
{
    use HasFactory;

    public function staff()
    {
        return $this->hasMany(Staf::class, 'kod_PT', 'Kod_PT');
    }

}
