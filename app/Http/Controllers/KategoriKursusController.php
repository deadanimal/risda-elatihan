<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategoriKursusRequest;
use App\Http\Requests\UpdateKategoriKursusRequest;
use App\Models\KategoriKursus;
use App\Models\BidangKursus;

class KategoriKursusController extends Controller
{
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
        $bil_kk = KategoriKursus::orderBy('id', 'desc')->first();
        if ($bil_kk != null) {
            $bil = $bil_kk->kod_Kategori_Kursus;
        }else{
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);

        return view('utiliti.kursus.kategori.index', [
            'bidangKursus' => $bidangKursus,
            'kategoriKursus' => $kategoriKursus,
            'bil' => $bil
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
        $kategoriKursus->nama_Kategori_Kursus = $request->nama_Kategori_Kursus;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $kategoriKursus->status_Kategori_Kursus = $status;
        // dd($kategoriKursus);
        $kategoriKursus->save();
        return redirect('/utiliti/kategori_kursus');
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
    public function update(UpdateKategoriKursusRequest $request, KategoriKursus $kategoriKursus)
    {
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
        return redirect('/utiliti/kategori_kursus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriKursus  $kategoriKursus
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriKursus $kategoriKursus)
    {
        $kategoriKursus->delete();
        return redirect('/utiliti/kategori_kursus');
    }
}
