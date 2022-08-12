<?php

namespace App\Exports;

use App\Models\JadualKursus;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class KewanganTerperinciExport implements FromView
{
    public function view(): View
    {

        return view('laporan.laporan_lain.excel.laporan_kewangan_terperinci');
}
}
