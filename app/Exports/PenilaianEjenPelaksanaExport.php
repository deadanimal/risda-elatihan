<?php

namespace App\Exports;

use App\Models\PenilaianEjenPelaksana;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class PenilaianEjenPelaksanaExport implements FromView
{

    use Exportable;

    public function view(): View
    {
        $ejen = PenilaianEjenPelaksana::with(['kursus'])->get();


        // foreach ($penilaian as $p) {
        //     $p['user'] = User::find($p->nama_peserta);
        // }

        return view('laporan.laporan_lain.excel.laporan_ejen_pelaksana', [
        'ejen' => $ejen,


    ]);
    }

}
