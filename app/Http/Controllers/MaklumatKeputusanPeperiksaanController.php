<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMaklumatKeputusanPeperiksaanRequest;
use App\Http\Requests\UpdateMaklumatKeputusanPeperiksaanRequest;
use App\Models\MaklumatKeputusanPeperiksaan;

class MaklumatKeputusanPeperiksaanController extends Controller
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
     * @param  \App\Http\Requests\StoreMaklumatKeputusanPeperiksaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMaklumatKeputusanPeperiksaanRequest $request)
    {
        $maklumatKeputusanPeperiksaan = new MaklumatKeputusanPeperiksaan($request->all());
        $maklumatKeputusanPeperiksaan->save();
        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/us-uls/pengajian-lanjutan/maklumat-keputusan-peperiksaan/'.$request->id_pengajian_lanjutan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaklumatKeputusanPeperiksaan  $maklumatKeputusanPeperiksaan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('uls.urus_setia.pengajian_lanjutan.keputusan', [
            'id_pengajian_lanjutan' => $id,
            'keputusan' => MaklumatKeputusanPeperiksaan::where('id_pengajian_lanjutan', $id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaklumatKeputusanPeperiksaan  $maklumatKeputusanPeperiksaan
     * @return \Illuminate\Http\Response
     */
    public function edit(MaklumatKeputusanPeperiksaan $maklumatKeputusanPeperiksaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMaklumatKeputusanPeperiksaanRequest  $request
     * @param  \App\Models\MaklumatKeputusanPeperiksaan  $maklumatKeputusanPeperiksaan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMaklumatKeputusanPeperiksaanRequest $request, MaklumatKeputusanPeperiksaan $maklumatKeputusanPeperiksaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaklumatKeputusanPeperiksaan  $maklumatKeputusanPeperiksaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaklumatKeputusanPeperiksaan $maklumatKeputusanPeperiksaan)
    {
        $maklumatKeputusanPeperiksaan->delete();
        alert()->success('Maklumat telah dihapuskan', 'Berjaya');
        return back();
    }
}
