<?php

namespace App\Exports;

use App\Models\Agensi;
use App\Models\KategoriAgensi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class RingkasanPenceramahExport implements FromView
{
    use Exportable;
    public function view(): View
    {
        $id_penceramah = KategoriAgensi::where('Kategori_Agensi', 'Penceramah')->first()->id;

        $penceramah = Agensi::where('kategori_agensi', $id_penceramah)->with('penceramahKonsultan')->get();

        foreach ($penceramah as $p) {
            foreach ($p->penceramahKonsultan as $pk) {
                $pk['tahun'] = date('Y', strtotime($pk->jadual_kursus->tarikh_mula));
                $pk['mula'] = date('d/mY', strtotime($pk->jadual_kursus->tarikh_mula));
                $pk['tamat'] = date('d/m/Y', strtotime($pk->jadual_kursus->tarikh_mula));
                $pk['tempat'] = Agensi::with('tempat')->find($pk->jadual_kursus->kursus_tempat)->nama_Agensi;

            }
        }

        return view('laporan.laporan_lain.excel.laporan_ringkasan_penceramah_kursus', [
            'penceramah' => $penceramah,
        ]);

    }
}
