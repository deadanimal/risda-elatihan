<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAturcaraRequest;
use App\Http\Requests\UpdateAturcaraRequest;
use App\Models\Aturcara;
use App\Models\JadualKursus;

class AturcaraController extends Controller
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
     * @param  \App\Http\Requests\StoreAturcaraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAturcaraRequest $request)
    {
        for ($i=0; $i < $request->bil_sesi; $i++) { 
            $aturcara = new Aturcara;
            $aturcara->ac_jadual_kursus = $request->ac_jadual_kursus;
            $aturcara->ac_hari = $request->hari;
            $aturcara->ac_sesi = $request->ac_sesi[$i];
            $aturcara->ac_masa = $request->ac_masa[$i];
            $aturcara->ac_aturcara = $request->ac_aturcara[$i];
            $aturcara->save();
        }
        alert()->success('Maklumat hari '.$request->hari.' telah disimpan.', 'Berjaya');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aturcara  $aturcara
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $total_hari = JadualKursus::where('id', $id)->sum('bilangan_hari');
        $aturcara = Aturcara::where('ac_jadual_kursus', $id)->get();
        return view('pengurusan_kursus.semak_jadual.aturcara',[
            'total_hari'=>$total_hari,
            'id'=>$id,
            'aturcara'=>$aturcara
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aturcara  $aturcara
     * @return \Illuminate\Http\Response
     */
    public function edit(Aturcara $aturcara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAturcaraRequest  $request
     * @param  \App\Models\Aturcara  $aturcara
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAturcaraRequest $request, Aturcara $aturcara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aturcara  $aturcara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aturcara $aturcara)
    {
        //
    }
}
