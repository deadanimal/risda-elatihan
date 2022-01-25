<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGredPegawaiRequest;
use App\Http\Requests\UpdateGredPegawaiRequest;
use App\Models\GredPegawai;

class GredPegawaiController extends Controller
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
        $gredPegawai = GredPegawai::all();
        return view('utiliti.kursus.gred_pegawai.index',[
            'gredPegawai'=>$gredPegawai,
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
     * @param  \App\Http\Requests\StoreGredPegawaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGredPegawaiRequest $request)
    {
        $gredPegawai = new GredPegawai;
        $gredPegawai->kod_Gred = $request->kod_Gred;
        $gredPegawai->nama_Gred = $request->nama_Gred;
        $gredPegawai->keterangan_Gred = $request->keterangan_Gred;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $gredPegawai->status_Gred = $status;

        $gredPegawai->save();
        alert()->success('Maklumat telah ditambah', 'Tambah');
        return redirect('/utiliti/kursus/gred_pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GredPegawai  $gredPegawai
     * @return \Illuminate\Http\Response
     */
    public function show(GredPegawai $gredPegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GredPegawai  $gredPegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(GredPegawai $gredPegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGredPegawaiRequest  $request
     * @param  \App\Models\GredPegawai  $gredPegawai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGredPegawaiRequest $request, GredPegawai $gredPegawai)
    {
        $gredPegawai->kod_Gred = $request->kod_Gred;
        $gredPegawai->nama_Gred = $request->nama_Gred;
        $gredPegawai->keterangan_Gred = $request->keterangan_Gred;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $gredPegawai->status_Gred = $status;

        $gredPegawai->save();
        alert()->success('Maklumat telah dikemaskini', 'Kemaskini');
        return redirect('/utiliti/kursus/gred_pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GredPegawai  $gredPegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(GredPegawai $gredPegawai)
    {
        $gredPegawai->delete();
        alert()->success('Maklumat telah dihapuskan', 'Hapus');
        return redirect('/utiliti/kursus/gred_pegawai');
    }
}
