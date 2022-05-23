<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerbelanjaanYuranRequest;
use App\Http\Requests\UpdatePerbelanjaanYuranRequest;
use App\Models\PerbelanjaanYuran;

class PerbelanjaanYuranController extends Controller
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
     * @param  \App\Http\Requests\StorePerbelanjaanYuranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePerbelanjaanYuranRequest $request)
    {
        $perbelanjaanYuran = new PerbelanjaanYuran($request->all());
        $perbelanjaanYuran->save();
        alert()->success('Malumat telah disimpan', 'Berjaya');
        return redirect('/us-uls/pengajian-lanjutan/perbelanjaan-yuran/'.$request->id_pengajian_lanjutan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerbelanjaanYuran  $perbelanjaanYuran
     * @return \Illuminate\Http\Response
     */
    public function show($id_pengajian_lanjutan)
    {
        return view('uls.urus_setia.pengajian_lanjutan.yuran', [
            'id_pengajian_lanjutan' => $id_pengajian_lanjutan,
            'perbelanjaan_yuran' => PerbelanjaanYuran::where('id_pengajian_lanjutan', $id_pengajian_lanjutan)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerbelanjaanYuran  $perbelanjaanYuran
     * @return \Illuminate\Http\Response
     */
    public function edit(PerbelanjaanYuran $perbelanjaanYuran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerbelanjaanYuranRequest  $request
     * @param  \App\Models\PerbelanjaanYuran  $perbelanjaanYuran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerbelanjaanYuranRequest $request, PerbelanjaanYuran $perbelanjaanYuran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerbelanjaanYuran  $perbelanjaanYuran
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerbelanjaanYuran $perbelanjaanYuran)
    {
        
        $perbelanjaanYuran->delete();
        alert()->success('Maklumat telah dihapuskan', 'Berjaya');
        return back();
    }
}
