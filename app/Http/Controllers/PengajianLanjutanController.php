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
        // dd(PengajianLanjutan::with(['pengguna','pusat_tanggungjawab', 'data_staf', 'perbelanjaan'])->get());
        return view('uls.urus_setia.pengajian_lanjutan.index', [
            'pengajian_lanjutan' => PengajianLanjutan::with(['pengguna', 'data_pusat_tanggungjawab', 'data_staf'])->get(),
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
        return redirect('/us-uls/pengajian-lanjutan/maklumat-keputusan-peperiksaan/'. $staf_pl->id);
    }

    public function editUls($staf_pl)
    {
        $staf_pl = PengajianLanjutan::with(['data_pusat_tanggungjawab', 'pengguna'])->where('id', $staf_pl)->first();
        return view('uls.urus_setia.pengajian_lanjutan.edit', [
            'staf_pl' => $staf_pl,
            'pusat_tanggungjawab' => PusatTanggungjawab::all(),
            'staf' => User::where('jenis_pengguna', 'Peserta ULS')->get()
        ]);
    }

    public function updateUls(Request $request, PengajianLanjutan $staf_pl)
    {
        $data = $request->all();
        $staf_pl->fill($data)->save();
        AuditTrailController::audit('kehadiran', 'pengajian lanjutan', 'kemaskini');
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        return redirect('/us-uls/pengajian-lanjutan/perbelanjaan-yuran/' . $staf_pl->id);
    }

    public function showUls($id_pengajian_lanjutan)
    {
        $pengajian_lanjutan = PengajianLanjutan::find($id_pengajian_lanjutan);
        return view('uls.urus_setia.pengajian_lanjutan.perbelanjaan', [
            'id_pengajian_lanjutan' => $id_pengajian_lanjutan,
            'pl' => $pengajian_lanjutan,
        ]);
    }

    public function destroyUls(PengajianLanjutan $staf_pl)
    {
        $staf_pl->delete();
        AuditTrailController::audit('kehadiran', 'pengajian lanjutan', 'hapus');
        alert()->success('Maklumat telah dihapuskan', 'Berjaya');
        return redirect('/us-uls/pengajian-lanjutan');
    }
}
