<?php

namespace App\Exports;

use App\Models\JadualKursus;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class RingkasanBidangKursusExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        $bilangan_peserta=0;

        $kursus = JadualKursus::with(['kategori_kursus','bidang','kodkursus','kehadiran'])->get();
        // $bilangan_peserta += count($kursus->kehadiran);

        // dd('2');
        return view('laporan.laporan_lain.excel.laporan_ringkasan_bidang_kursus', [
        'kursus' => $kursus,
        // 'bilangan_peserta'=>$bilangan_peserta
        ]);
    }
}
