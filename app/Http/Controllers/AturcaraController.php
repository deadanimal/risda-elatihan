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
            $check = Aturcara::where('ac_jadual_kursus', $request->ac_jadual_kursus)
            ->where('ac_hari', $request->hari)
            ->where('ac_sesi', $request->ac_sesi[$i])->first();
            if ($check != null) {
                $check->delete();
            }
            $aturcara = new Aturcara;
            $aturcara->ac_jadual_kursus = $request->ac_jadual_kursus;
            $aturcara->ac_hari = $request->hari;
            $aturcara->ac_sesi = $request->ac_sesi[$i];
            $aturcara->ac_masa = $request->ac_masa[$i];
            $aturcara->ac_aturcara = $request->ac_aturcara[$i];
            $aturcara->save();
        }
        alert()->success('Maklumat hari '.$request->hari.' telah disimpan.', 'Berjaya');
        return redirect('/pengurusan_kursus/aturcara/'.$request->ac_jadual_kursus);
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
        $aturcara = Aturcara::where('ac_jadual_kursus', $id)->orderBy('ac_hari', 'ASC')->get()->groupBy('ac_hari');
        if ($aturcara->isEmpty()) {
            $aturcara = null;
        }
        
        $list_aturcara =Aturcara::where('ac_jadual_kursus', $id)->orderBy('ac_hari', 'ASC')->get();
        return view('pengurusan_kursus.semak_jadual.aturcara',[
            'total_hari'=>$total_hari,
            'id'=>$id,
            'aturcara'=>$aturcara,
            'list_aturcara'=>$list_aturcara
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
