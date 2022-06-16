<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKodKursusRequest;
use App\Http\Requests\UpdateKodKursusRequest;
use App\Models\KodKursus;
use App\Models\KategoriKursus;
use App\Models\BidangKursus;
use Illuminate\Support\Facades\Auth;

class KodKursusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $check = Auth::user()->jenis_pengguna;
        if ($check == 'Urus Setia ULS') {
            $kodKursus = KodKursus::with('jadual', 'kategori', 'bidang')->where('UL_Kod_Kursus', 'Staf')->get();
            $bidangKursus = BidangKursus::where('UL_Bidang_Kursus', 'Staf')->get();
        } 
        elseif ($check == 'Urus Setia ULPK') {
            $kodKursus = KodKursus::with('jadual', 'kategori', 'bidang')->where('UL_Kod_Kursus', 'Pekebun Kecil')->get();
            $bidangKursus = BidangKursus::where('UL_Bidang_Kursus', 'Pekebun Kecil')->get();
        }
        else {
            $kodKursus = KodKursus::with('jadual', 'kategori', 'bidang')->get();
            $bidangKursus = BidangKursus::all();
        }
        
        $kategoriKursus = KategoriKursus::all();
        $bil_staf = KodKursus::where('UL_Kod_Kursus', 'Staf')->get();
        $bil_pk = KodKursus::where('UL_Kod_Kursus', 'Pekebun Kecil')->get();

        $tahun_ini = date("Y");
        $hari_ini = date("Y-m-d");

        return view('utiliti.kursus.kod_kursus.index', [
            'bidangKursus' => $bidangKursus,
            'kategoriKursus' => $kategoriKursus,
            'kodKursus' => $kodKursus,
            'bil_staf' => $bil_staf,
            'bil_pk' => $bil_pk,
            'tahun_ini' => $tahun_ini,
            'hari_ini' => $hari_ini
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKodKursusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKodKursusRequest $request)
    {
        $kodKursus = new KodKursus;
        $kodKursus->UL_Kod_Kursus = $request->UL_Kod_Kursus;
        $kodKursus->tahun_Kursus = $request->tahun_Kursus;
        $kodKursus->tarikh_daftar_Kursus = $request->tarikh_daftar_Kursus;
        $kodKursus->U_Bidang_Kursus = $request->U_Bidang_Kursus;
        $kodKursus->U_Kategori_Kursus = $request->U_Kategori_Kursus;
        $kodKursus->kod_Kursus = $request->kod_Kursus;
        $kodKursus->no_kod_Kursus = $request->no_kod_Kursus;
        $kodKursus->tajuk_Kursus = $request->tajuk_Kursus;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $kodKursus->status_Kod_Kursus = $status;
        // dd($kodKursus);
        $kodKursus->save();
        AuditTrailController::audit('utiliti','kod kursus','cipta', $kodKursus->tajuk_Kursus);
        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/utiliti/kursus/kod_kursus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KodKursus  $kodKursus
     * @return \Illuminate\Http\Response
     */
    public function show(KodKursus $kodKursus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KodKursus  $kodKursus
     * @return \Illuminate\Http\Response
     */
    public function edit(KodKursus $kodKursus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKodKursusRequest  $request
     * @param  \App\Models\KodKursus  $kodKursus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKodKursusRequest $request, $id)
    {
        $kodKursus = KodKursus::find($id);
        $kodKursus->UL_Kod_Kursus = $request->UL_Kod_Kursus;
        $kodKursus->tahun_Kursus = $request->tahun_Kursus;
        $kodKursus->tarikh_daftar_Kursus = $request->tarikh_daftar_Kursus;
        $kodKursus->U_Bidang_Kursus = $request->U_Bidang_Kursus;
        $kodKursus->U_Kategori_Kursus = $request->U_Kategori_Kursus;
        $kodKursus->kod_Kursus = $request->tarikh_daftar_Kursus;
        $kodKursus->nama_Kod_Kursus = $request->U_Bidang_Kursus;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $kodKursus->status_Kod_Kursus = $status;
        // dd($kodKursus);
        $kodKursus->save();
        AuditTrailController::audit('utiliti','kod kursus','kemaskini', $kodKursus->tajuk_Kursus);
        alert()->success('Maklumat telah dikemaskin', 'Berjaya');
        return redirect('/utiliti/kursus/kod_kursus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KodKursus  $kodKursus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kodKursus = KodKursus::find($id);
        $nama = $kodKursus->tajuk_Kursus;
        $kodKursus->delete();
        AuditTrailController::audit('utiliti','kod kursus','hapus', $nama);
        alert()->success('Maklumat telah dihapus','Berjaya');
        return redirect('/utiliti/kursus/kod_kursus');
    }
}
