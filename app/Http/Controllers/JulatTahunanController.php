<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJulatTahunanRequest;
use App\Http\Requests\UpdateJulatTahunanRequest;
use App\Models\JulatTahunan;

class JulatTahunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $julat = JulatTahunan::all();
        $bil_jul = JulatTahunan::orderBy('id', 'desc')->first();
        if ($bil_jul != null) {
            $bil = $bil_jul->kod_Julat_tahunan;
        }else{
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('utiliti.julat.julat_tahunan.index', [
            'julat'=>$julat,
            'bil'=>$bil
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
     * @param  \App\Http\Requests\StoreJulatTahunanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJulatTahunanRequest $request)
    {
        $julatTahunan = new JulatTahunan;
        $julatTahunan->kod_Julat_tahunan = $request->kod_Julat_tahunan;
        $julatTahunan->tahun_Mula = $request->tahun_Mula;
        $julatTahunan->tahun_Tamat = $request->tahun_Tamat;
        $julatTahunan->keterangan_Julat_tahunan = $request->keterangan_Julat_tahunan;
        $julatTahunan->julat_tahunan_dikemaskini_oleh = $request->julat_tahunan_dikemaskini_oleh;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $julatTahunan->status_julat_tahunan = $status;

        $julatTahunan->save();
        return redirect('/utiliti/julat/julat_tahunan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JulatTahunan  $julatTahunan
     * @return \Illuminate\Http\Response
     */
    public function show(JulatTahunan $julatTahunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JulatTahunan  $julatTahunan
     * @return \Illuminate\Http\Response
     */
    public function edit(JulatTahunan $julatTahunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJulatTahunanRequest  $request
     * @param  \App\Models\JulatTahunan  $julatTahunan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJulatTahunanRequest $request, JulatTahunan $julatTahunan)
    {
        $julatTahunan->kod_Julat_tahunan = $request->kod_Julat_tahunan;
        $julatTahunan->tahun_Mula = $request->tahun_Mula;
        $julatTahunan->tahun_Tamat = $request->tahun_Tamat;
        $julatTahunan->keterangan_Julat_tahunan = $request->keterangan_Julat_tahunan;
        $julatTahunan->julat_tahunan_dikemaskini_oleh = $request->julat_tahunan_dikemaskini_oleh;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $julatTahunan->status_julat_tahunan = $status;

        $julatTahunan->save();
        return redirect('/utiliti/julat/julat_tahunan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JulatTahunan  $julatTahunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JulatTahunan $julatTahunan)
    {
        $julatTahunan->delete();
        return redirect('/utiliti/julat/julat_tahunan');
    }
}
