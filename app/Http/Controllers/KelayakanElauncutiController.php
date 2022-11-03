<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKelayakanElauncutiRequest;
use App\Http\Requests\UpdateKelayakanElauncutiRequest;
use App\Models\ElaunCuti;
use App\Models\KelayakanElauncuti;

class KelayakanElauncutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreKelayakanElauncutiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKelayakanElauncutiRequest $request)
    {
        $kelayakanElauncuti = new KelayakanElauncuti($request->all());
        $kelayakanElauncuti->save();

        alert()->success('Maklumat telah disimpan','Berjaya');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KelayakanElauncuti  $kelayakanElauncuti
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelayakanElauncuti = ElaunCuti::join('kelayakan_elauncutis', 'elaun_cutis.id', 'kelayakan_elauncutis.kec_jenis_elaun')->where('kec_jadual_kursus', $id)->get();
        $elauncuti = ElaunCuti::all();

        return view('pengurusan_kursus.semak_jadual.kelayakan_elaun_cuti', [
            'kelayakanElauncuti'=> $kelayakanElauncuti,
            'elauncuti'=>$elauncuti,
            'id'=>$id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KelayakanElauncuti  $kelayakanElauncuti
     * @return \Illuminate\Http\Response
     */
    public function edit(KelayakanElauncuti $kelayakanElauncuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKelayakanElauncutiRequest  $request
     * @param  \App\Models\KelayakanElauncuti  $kelayakanElauncuti
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKelayakanElauncutiRequest $request, KelayakanElauncuti $kelayakanElauncuti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KelayakanElauncuti  $kelayakanElauncuti
     * @return \Illuminate\Http\Response
     */
    public function destroy(KelayakanElauncuti $kelayakanElauncuti)
    {
        $kelayakanElauncuti->delete();
        alert()->success('Maklumat telah dihapuskan', 'Berjaya');
        return back();
    }
}
