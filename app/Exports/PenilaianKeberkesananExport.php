<?php

namespace App\Exports;

use App\Models\PenilaianKeberkesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class PenilaianKeberkesananExport implements FromView
{
    use Exportable;

    public function view(): View
    {
    $ejen = PenilaianEjenPelaksana::with(['kursus'])->get();


    $kursus = JadualKursus::find($id);
    // $kehadiran = Kehadiran::with(['kursus','staff','penilaiankeberkesanan'])->where('jadual_kursus_id',$kursus->id)->get();
    $pk = PenilaianKeberkesanan::with('kehadiran');


    // dd($id);
    return view('laporan.laporan_lain.penilaian.laporan-penilaian-keberkesanan', [
    'pk'=>$pk,
    'kursus'=>$kursus
    ]);

}
