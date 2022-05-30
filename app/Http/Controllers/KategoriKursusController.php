<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategoriKursusRequest;
use App\Http\Requests\UpdateKategoriKursusRequest;
use App\Models\KategoriKursus;
use App\Models\BidangKursus;
use App\Models\KodKursus;

class KategoriKursusController extends Controller
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
        $bidangKursus = BidangKursus::all();
        $kategoriKursus = BidangKursus::join('kategori_kursuses', 'bidang_kursuses.id', 'kategori_kursuses.U_Bidang_Kursus')
        ->select('*')->get();
        // dd($kategoriKursus);

        $bil_ds = KategoriKursus::where('UL_Kategori_Kursus', 'Staf')->where('jenis_Kategori_Kursus', 'Dalaman')->get();
        $bil_ls = KategoriKursus::where('UL_Kategori_Kursus', 'Staf')->where('jenis_Kategori_Kursus', 'Luaran')->get();
        $bil_pk = KategoriKursus::where('UL_Kategori_Kursus', 'Pekebun Kecil')->get();

        return view('utiliti.kursus.kategori.index', [
            'bidangKursus' => $bidangKursus,
            'kategoriKursus' => $kategoriKursus,
            'bil_ds' => $bil_ds,
            'bil_ls' => $bil_ls,
            'bil_pk' => $bil_pk,
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
     * @param  \App\Http\Requests\StoreKategoriKursusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriKursusRequest $request)
    {
        $kategoriKursus = new KategoriKursus;
        $kategoriKursus->UL_Kategori_Kursus = $request->UL_Kategori_Kursus;
        $kategoriKursus->U_Bidang_Kursus = $request->U_Bidang_Kursus;
        $kategoriKursus->jenis_Kategori_Kursus = $request->jenis_Kategori_Kursus;
        $kategoriKursus->kod_Kategori_Kursus = $request->kod_Kategori_Kursus;
        $kategoriKursus->no_kod_KK = $request->no_kod_KK;
        $kategoriKursus->nama_Kategori_Kursus = $request->nama_Kategori_Kursus;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $kategoriKursus->status_Kategori_Kursus = $status;
        $kategoriKursus->save();
        AuditTrailController::audit('utiliti','kategori kursus','cipta');
        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/utiliti/kursus/kategori_kursus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriKursus  $kategoriKursus
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriKursus $kategoriKursus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriKursus  $kategoriKursus
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriKursus $kategoriKursus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriKursusRequest  $request
     * @param  \App\Models\KategoriKursus  $kategoriKursus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriKursusRequest $request, $id)
    {
        $kategoriKursus = KategoriKursus::find($id);
        $kategoriKursus->UL_Kategori_Kursus = $request->UL_Kategori_Kursus;
        $kategoriKursus->U_Bidang_Kursus = $request->U_Bidang_Kursus;
        $kategoriKursus->jenis_Kategori_Kursus = $request->jenis_Kategori_Kursus;
        $kategoriKursus->kod_Kategori_Kursus = $request->kod_Kategori_Kursus;
        $kategoriKursus->nama_Kategori_Kursus = $request->nama_Kategori_Kursus;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $kategoriKursus->status_Kategori_Kursus = $status;
        $kategoriKursus->save();
        AuditTrailController::audit('utiliti','kategori kursus','kemaskini');
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        return redirect('/utiliti/kursus/kategori_kursus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriKursus  $kategoriKursus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kod_kursus = KodKursus::where('U_Kategori_Kursus', $id)->get();
        foreach ($kod_kursus as $key => $kk) {
            $kk->delete();
        }
        $kategoriKursus = KategoriKursus::find($id);
        $kategoriKursus->delete();
        AuditTrailController::audit('utiliti','kategori kursus','hapus');
        alert()->success('Maklumat telah dihapus', 'Berjaya');
        return redirect('/utiliti/kursus/kategori_kursus');
    }
}
