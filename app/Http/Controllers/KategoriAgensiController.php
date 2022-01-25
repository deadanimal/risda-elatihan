<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategoriAgensiRequest;
use App\Http\Requests\UpdateKategoriAgensiRequest;
use App\Models\KategoriAgensi;

class KategoriAgensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = KategoriAgensi::all();
        $bil_neg = KategoriAgensi::orderBy('id', 'desc')->first();
        if ($bil_neg != null) {
            $bil = $bil_neg->kategori_agensi_kod;
        }else{
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('utiliti.kumpulan.kategori_agensi.index', [
            'kategori'=>$kategori,
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
     * @param  \App\Http\Requests\StoreKategoriAgensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriAgensiRequest $request)
    {
        $kategori = new KategoriAgensi;
        $kategori->Kategori_Agensi_kod = $request->Kategori_Agensi_kod;
        $kategori->Kategori_Agensi = $request->Kategori_Agensi;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $kategori->status_kategori_agensi = $status;

        $kategori->save();
        return redirect('/utiliti/kumpulan/kategori_agensi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriAgensi  $kategoriAgensi
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriAgensi $kategoriAgensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriAgensi  $kategoriAgensi
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriAgensi $kategoriAgensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriAgensiRequest  $request
     * @param  \App\Models\KategoriAgensi  $kategoriAgensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriAgensiRequest $request, KategoriAgensi $kategoriAgensi)
    {
        $kategoriAgensi->Kategori_Agensi_kod = $request->Kategori_Agensi_kod;
        $kategoriAgensi->Kategori_Agensi = $request->Kategori_Agensi;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $kategoriAgensi->status_kategori_agensi = $status;

        $kategoriAgensi->save();
        return redirect('/utiliti/kumpulan/kategori_agensi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriAgensi  $kategoriAgensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriAgensi $kategoriAgensi)
    {
        $kategoriAgensi->delete();
        return redirect('/utiliti/kumpulan/kategori_agensi');
    }
}
