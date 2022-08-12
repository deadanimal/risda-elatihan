<?php

namespace App\Exports;

use App\Models\JadualKursus;
use Maatwebsite\Excel\Concerns\FromCollection;

class PerlaksanaanLatihanStafExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JadualKursus::all();
    }
}
