<?php

namespace App\Http\Controllers;

class PengajianLanjutanController extends Controller
{

    public function indexUls()
    {
        return view('uls.urus_setia.pengajian_lanjutan.index');
    }

    public function yuranUls()
    {
        return view('uls.urus_setia.pengajian_lanjutan.yuran');
    }
    public function indexUlpk()
    {
        return view('ulpk.urus_setia.pengajian_lanjutan.index');
    }

    public function yuranUlpk()
    {
        return view('ulpk.urus_setia.pengajian_lanjutan.yuran');
    }

}
