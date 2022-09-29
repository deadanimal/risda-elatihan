<?php

namespace App\Exports;

use App\Models\KehadiranPusatLatihan;
use App\Models\JadualKursus;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class KehadiranPlExport implements FromView
{
    use Exportable;
    public function view(): View{

    $pl = KehadiranPusatLatihan::with(['kursus', 'tempat_kursus'])->get();
    // $kursus = JadualKursus::where('id',$pl->jadual_kursus_id)->first();

    // dd($pl);


    // $tahun = substr($pl->user->no_kp, 0, 2);
    // $tahun = (int)$tahun;
    // if ($tahun <= 30) {
        //     $tahun_lahir = '20'.$tahun;
    // } else {
        //     $tahun_lahir = '19'.$tahun;
    // }
    // $tahun_ini = date('Y');


    // $umur_peserta = $tahun_ini - $tahun_lahir;
        // dd($kursus);
    return view('laporan.laporan_lain.excel.laporan_kehadiran_pl',[
        'pl' => $pl,
    ]);
    // 'umur_peserta'=>$umur_peserta
}


}
