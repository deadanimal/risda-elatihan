<?php

namespace App\Exports;

use App\Models\PrePostTest;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;

class PrePostTestExport implements FromView
{
    public function view(): View
    {
        $pretest = PrePostTest::with('kursus');

        return view('laporan.laporan_lain.excel.laporan-penilaian-prepost-show', [
            'pretest'=>$pretest
        ]);
    }
}
