<?php

namespace App\Exports;

use App\Models\Negeri;
use App\Models\PusatTanggungjawab;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class PencapaianLatihanNegeriExport implements FromView
{
    use Exportable;
    public function view(): View{

        $pusat_tanggungjawab = PusatTanggungjawab::all();

        return view('laporan.laporan_lain.excel.pencapaian_latihan_mengikut_negeri', [
            'pusat_tanggungjawab' => $pusat_tanggungjawab,
        ]);

    }
}
