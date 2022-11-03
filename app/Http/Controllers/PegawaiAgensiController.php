<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePegawaiAgensiRequest;
use App\Http\Requests\UpdatePegawaiAgensiRequest;
use App\Models\PegawaiAgensi;

class PegawaiAgensiController extends Controller
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
     * @param  \App\Http\Requests\StorePegawaiAgensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePegawaiAgensiRequest $request)
    {
        $pegawai = new PegawaiAgensi;
        $pegawai->id_agensi = $request->id_agensi;
        $pegawai->no_KP_Pegawai = $request->no_KP_Pegawai;
        $pegawai->nama_Pegawai = $request->nama_Pegawai;
        $pegawai->jawatan_Pegawai = $request->jawatan_Pegawai;
        $pegawai->emel_Pegawai = $request->emel_Pegawai;
        $pegawai->telefon_pejabat_Pegawai = $request->telefon_pejabat_Pegawai;
        $pegawai->sambungan_Pegawai = $request->sambungan_Pegawai;
        $pegawai->telefon_bimbit_Pegawai = $request->telefon_bimbit_Pegawai;
        $pegawai->no_faks_Pegawai = $request->no_faks_Pegawai;

        $pegawai->save();
        AuditTrailController::audit('utiliti','pegawai agensi','cipta', $pegawai->nama_Pegawai);
        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/pegawai_agensi/'.$pegawai->id_agensi);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PegawaiAgensi  $pegawaiAgensi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_agensi = $id;
        $pegawai = PegawaiAgensi::where('id_agensi', $id)->get();
        return view('utiliti.kumpulan.agensi.pegawai',[
            'pegawai'=>$pegawai,
            'id_agensi'=>$id_agensi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PegawaiAgensi  $pegawaiAgensi
     * @return \Illuminate\Http\Response
     */
    public function edit(PegawaiAgensi $pegawaiAgensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePegawaiAgensiRequest  $request
     * @param  \App\Models\PegawaiAgensi  $pegawaiAgensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePegawaiAgensiRequest $request, PegawaiAgensi $pegawaiAgensi)
    {
        $pegawaiAgensi->id_agensi = $request->id_agensi;
        $pegawaiAgensi->no_KP_Pegawai = $request->no_KP_Pegawai;
        $pegawaiAgensi->nama_Pegawai = $request->nama_Pegawai;
        $pegawaiAgensi->jawatan_Pegawai = $request->jawatan_Pegawai;
        $pegawaiAgensi->emel_Pegawai = $request->emel_Pegawai;
        $pegawaiAgensi->telefon_pejabat_Pegawai = $request->telefon_pejabat_Pegawai;
        $pegawaiAgensi->sambungan_Pegawai = $request->sambungan_Pegawai;
        $pegawaiAgensi->telefon_bimbit_Pegawai = $request->telefon_bimbit_Pegawai;
        $pegawaiAgensi->no_faks_Pegawai = $request->no_faks_Pegawai;

        $pegawaiAgensi->save();
        AuditTrailController::audit('utiliti','pegawai agensi','kemaskini', $pegawaiAgensi->nama_Pegawai);
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        return redirect('/pegawai_agensi/'.$pegawaiAgensi->id_agensi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PegawaiAgensi  $pegawaiAgensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(PegawaiAgensi $pegawaiAgensi)
    {
        $nama = $pegawaiAgensi->nama_Pegawai;
        $pegawaiAgensi->delete();
        AuditTrailController::audit('utiliti','pegawai agensi','hapus', $nama);
        alert()->success('Maklumat telah dihapuskan', 'Berjaya');
        return redirect('/pegawai_agensi/'.$pegawaiAgensi->id_agensi);
    }
}
