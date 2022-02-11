<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategoriKursusRequest;
use App\Http\Requests\UpdateKategoriKursusRequest;
use App\Models\KategoriKursus;
use App\Models\BidangKursus;

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
        $bil_pk = KategoriKursus::orderBy('id', 'desc')->where('UL_Kategori_Kursus', 'Pekebun Kecil')->first();
        if ($bil_pk != null) {
            $bil_pk = $bil_pk->no_kod_KK;
        }else{
            $bil_pk = 0;
        }
        $bil_pk = (int)$bil_pk + 1;
        $bil_pk = sprintf("%02d", $bil_pk);

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
        // dd($kategoriKursus);
        $kategoriKursus->save();
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
        // dd($kategoriKursus);
        $kategoriKursus->save();
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
        $kategoriKursus = KategoriKursus::find($id);
        $kategoriKursus->delete();
        return redirect('/utiliti/kursus/kategori_kursus');
    }
}
