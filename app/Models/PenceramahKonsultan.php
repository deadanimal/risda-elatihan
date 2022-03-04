<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenceramahKonsultan extends Model
{
    protected $guarded = ['id'];
    protected $with = ['agensi'];

    public function agensi()
    {
        return $this->hasOne(Agensi::class, 'id', 'pc_id');
    }
}
