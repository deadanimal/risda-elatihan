<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenceramahKonsultanRequest;
use App\Http\Requests\UpdatePenceramahKonsultanRequest;
use App\Models\PenceramahKonsultan;

class PenceramahKonsultanController extends Controller
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
     * @param  \App\Http\Requests\StorePenceramahKonsultanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenceramahKonsultanRequest $request)
    {
        $penceramahKonsultan = new PenceramahKonsultan($request->all());
        $penceramahKonsultan->save();

        alert()->success('Maklumat telah disimpan','Berjaya');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenceramahKonsultan  $penceramahKonsultan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penceramahKonsultan = PenceramahKonsultan::where('pc_jadual_kursus', $id)->get();

        return view('pengurusan_kursus.semak_jadual.penceramah_konsultan',[
            'id'=>$id,
            'penceramahKonsultan'=>$penceramahKonsultan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenceramahKonsultan  $penceramahKonsultan
     * @return \Illuminate\Http\Response
     */
    public function edit(PenceramahKonsultan $penceramahKonsultan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenceramahKonsultanRequest  $request
     * @param  \App\Models\PenceramahKonsultan  $penceramahKonsultan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenceramahKonsultanRequest $request, PenceramahKonsultan $penceramahKonsultan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenceramahKonsultan  $penceramahKonsultan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenceramahKonsultan $penceramahKonsultan)
    {
        $penceramahKonsultan->delete();
        alert()->success('Maklumat telah dihapuskan', 'Berjaya');
        return back();
    }
}
