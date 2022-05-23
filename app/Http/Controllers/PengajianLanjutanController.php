<?php

namespace App\Http\Controllers;

use App\Models\PengajianLanjutan;
use App\Models\PusatTanggungjawab;
use App\Models\Staf;
use App\Models\User;
use Illuminate\Http\Request;

class PengajianLanjutanController extends Controller
{

    public function indexUls()
    {
        return view('uls.urus_setia.pengajian_lanjutan.index', [
            'pengajian_lanjutan' => PengajianLanjutan::with('pengguna')->get(),
        ]);
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

    public function createUls()
    {
        return view('uls.urus_setia.pengajian_lanjutan.create', [
            'pusat_tanggungjawab' => PusatTanggungjawab::all(),
            'staf' => User::where('jenis_pengguna', 'Peserta ULS')->get()
        ]);
    }

    public function storeUls(Request $request)
    {
        $staf_pl = new PengajianLanjutan($request->all());
        $staf_pl->save();

        // AuditTrailController::audit('kehadiran', 'pengajian lanjutan', 'cipta');
        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/us-uls/pengajian-lanjutan/perbelanjaan-yuran/'.$staf_pl->id);
    }

    public function editUls(PengajianLanjutan $staf_pl)
    {
        return view('uls.urus_setia.pengajian_lanjutan.edit', [
            'staf_pl' => $staf_pl,
        ]);
    }

    public function updateUls(Request $request, PengajianLanjutan $staf_pl)
    {
        $data = $request->all();
        $staf_pl->fill($data)->save();
        AuditTrailController::audit('kehadiran', 'pengajian lanjutan', 'kemaskini');
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        return redirect('/us-uls/pengajian-lanjutan');
    }

    public function destroyUls(PengajianLanjutan $staf_pl)
    {
        $staf_pl->delete();
        AuditTrailController::audit('kehadiran', 'pengajian lanjutan', 'hapus');
        alert()->success('Maklumat telah dihapuskan', 'Berjaya');
        return redirect('/us-uls/pengajian-lanjutan');
    }
}
