<?php

namespace App\Exports;

use App\Models\Daerah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class KemajuanLatihanDaerahExport implements FromView
{
    use Exportable;
    private $headers = [
        'Content-Type' => 'text/csv',
    ];
    public function view(): View
    {
        return view('laporan.laporan_lain.excel.kemajuan.negeri');
    }
}
