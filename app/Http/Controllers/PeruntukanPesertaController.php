<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeruntukanPesertaRequest;
use App\Http\Requests\UpdatePeruntukanPesertaRequest;
use App\Models\JadualKursus;
use App\Models\PeruntukanPeserta;
use App\Models\Negeri;
use App\Models\PusatTanggungjawab;

class PeruntukanPesertaController extends Controller
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
     * @param  \App\Http\Requests\StorePeruntukanPesertaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeruntukanPesertaRequest $request)
    {
        $peruntukanPeserta = new PeruntukanPeserta($request->all());
        $peruntukanPeserta->save();
        alert()->success('Maklumat telah disimipan', 'Berjaya Disimpan');
        return redirect('/pengurusan_kursus/peruntukan_peserta/'.$request->pp_jadual_kursus);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PeruntukanPeserta  $peruntukanPeserta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadualKursus = JadualKursus::where('id', $id)->firstorFail();
        $negeri = Negeri::all();
        $pusat_tanggungjawab = PusatTanggungjawab::all();
        $peruntukan_peserta = PeruntukanPeserta::where('pp_jadual_kursus', $jadualKursus->id)->get();
        $total_calon = PeruntukanPeserta::where('pp_jadual_kursus', $jadualKursus->id)->sum('pp_peruntukan_calon');

        return view('pengurusan_kursus.semak_jadual.peruntukan_peserta',[
            'jadualKursus'=>$jadualKursus,
            'negeri'=>$negeri,
            'pusat_tanggungjawab'=>$pusat_tanggungjawab,
            'peruntukan_peserta'=>$peruntukan_peserta,
            'total_calon'=>$total_calon
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeruntukanPeserta  $peruntukanPeserta
     * @return \Illuminate\Http\Response
     */
    public function edit(PeruntukanPeserta $peruntukanPeserta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeruntukanPesertaRequest  $request
     * @param  \App\Models\PeruntukanPeserta  $peruntukanPeserta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeruntukanPesertaRequest $request, PeruntukanPeserta $peruntukanPeserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeruntukanPeserta  $peruntukanPeserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeruntukanPeserta $peruntukanPeserta)
    {
        //
    }
}
