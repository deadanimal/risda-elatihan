<?php

namespace App\Exports;

use App\Models\PenilaianPeserta;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;

class PenilaianPesertaExport implements FromView
{
    use Exportable;

    // public function collection()
    // {
    //     return PenilaianPeserta::all();
    // }

    public function view(): View
    {
        $penilaian = PenilaianPeserta::with(['kursus'])->get();


        // foreach ($penilaian as $p) {
        //     $p['user'] = User::find($p->nama_peserta);
        // }

        return view('laporan.laporan_lain.excel.laporan_penilaian_peserta', [
        'penilaian' => $penilaian,


    ]);
    }
}
