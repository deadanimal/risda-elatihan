<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajianLanjutan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pengguna()
    {
        return $this->hasOne(User::class, 'staf', 'id');
    }

    public function pusat_tanggungjawab()
    {
        return $this->hasOne(PusatTanggungjawab::class, 'pusat_tanggungjawab', 'id');
    }
}
