<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BidangKursus extends Model
{
    use HasFactory;

    public function kodkursus()
    {
        return $this->hasMany(KodKursus::class, 'U_Bidang_Kursus', 'id');
    }

    public function getTableColumns($table)
    {
        return DB::getSchemaBuilder()->getColumnListing($table);

        // OR

        // return Schema::getColumnListing($table);

    }
}
