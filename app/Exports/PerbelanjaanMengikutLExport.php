<?php

namespace App\Exports;
use App\Models\PusatTanggungjawab;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class PerbelanjaanMengikutLExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        $pt = PusatTanggungjawab::all();
        // dd($pt);
        return view('laporan.laporan_lain.excel.perbelanjaan_mengikut_lokaliti',[
            'pt'=>$pt
        ]);
    }
}
