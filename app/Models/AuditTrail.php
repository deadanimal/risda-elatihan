<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    use HasFactory;

    public function pengguna()
    {
        return $this->hasOne(User::class, 'id', 'id_pengguna');
    }
}
