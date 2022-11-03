<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianEjenPelaksana extends Model
{
    use HasFactory;


    public function penceramahKonsultan()
    {
        return $this->belongsTo(PenceramahKonsultan::class,'penceramah_konsultan_id','id');
    }




}
