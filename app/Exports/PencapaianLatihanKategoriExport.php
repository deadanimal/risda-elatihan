<?php

namespace App\Exports;

use App\Models\JadualKursus;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class PencapaianLatihanKategoriExport implements FromView
{
    use Exportable;
    public function view(): View
    {
        return view('laporan.laporan_lain.excel.laporan_prestasi_kategori');
    }
}
