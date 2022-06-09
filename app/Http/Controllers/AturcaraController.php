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
        // dd($request->all());

        foreach ($request->hari as $h => $hari) {
            $aturcara = new Aturcara;
            $aturcara->ac_jadual_kursus = $request->ac_jadual_kursus[$h];
            $aturcara->ac_hari = $request->hari[$h];
            $aturcara->ac_sesi = $request->ac_sesi[$h];
            $aturcara->ac_masa_mula = $request->ac_masa_mula[$h];
            $aturcara->ac_masa_tamat = $request->ac_masa_tamat[$h];
            $aturcara->ac_aturcara = $request->ac_aturcara[$h];
            $aturcara->save();
        }

        alert()->success('Maklumat telah disimpan.', 'Berjaya');
        return redirect('/pengurusan_kursus/aturcara/' . $request->ac_jadual_kursus[0]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aturcara  $aturcara
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $total_hari = JadualKursus::where('id', $id)->sum('bilangan_hari');
        $aturcara = Aturcara::where('ac_jadual_kursus', $id)->orderBy('ac_hari', 'ASC')->get()->groupBy('ac_hari');
        if ($aturcara->isEmpty()) {
            $aturcara = null;
        }

        $list_aturcara = Aturcara::where('ac_jadual_kursus', $id)->orderBy('ac_hari', 'ASC')->get();
        
        return view('pengurusan_kursus.semak_jadual.aturcara', [
            'total_hari' => $total_hari,
            'id' => $id,
            'aturcara' => $aturcara,
            'list_aturcara' => $list_aturcara
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
        $aturcara->ac_masa = $request->ac_masa;
        $aturcara->ac_aturcara = $request->ac_aturcara;

        $aturcara->save();
        alert()->success('Maklumat telah dikemaskini.', 'Berjaya');
        return redirect('/pengurusan_kursus/aturcara/'.$aturcara->ac_jadual_kursus);
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
