<?php

namespace App\Exports;
use App\Models\PusatTanggungjawab;
use App\Models\PerbelanjaanKursus;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class PerbelanjaanMengikutLExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        // $pt = PusatTanggungjawab::all();
        // dd($pt);
        $perbelanjaankursus = PerbelanjaanKursus::with(['pt'])->get();

        $pusat_tanggungjawab = PusatTanggungjawab::with('negeri')->where('id',$perbelanjaankursus->kod_PT)->first();


        return view('laporan.laporan_lain.excel.perbelanjaan_mengikut_lokaliti',[
            'perbelanjaankursus'=>$perbelanjaankursus
        ]);
    }
}
