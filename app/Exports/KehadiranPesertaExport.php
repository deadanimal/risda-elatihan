<?php

namespace App\Exports;

use App\Models\Kehadiran;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;

class KehadiranPesertaExport implements FromView
{

    use Exportable;

    // private $headers = [
    //     'Content-Type' => 'text/csv',
    // ];

    // public function collection()
    // {
    //     return Kehadiran::with(['kursus','staff'])->get();
    // }

    public function view(): View
    {
        $kehadiran = Kehadiran::with(['staff','kursus'])->get();
        // $kursus = JadualKursus::with('tempat');

        foreach ($kehadiran as $k) {
            $k['user'] = User::find($k->no_pekerja);
            // $k['tempat'] = JadualKursus::with('tempat');
        }

        return view('laporan.laporan_lain.excel.laporan_kehadiran_peserta', [
            'kehadiran' => $kehadiran,
            // 'kursus'=>$kursus,

        ]);
}




}
