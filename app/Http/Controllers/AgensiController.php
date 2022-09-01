<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgensiRequest;
use App\Http\Requests\UpdateAgensiRequest;
use App\Models\Agensi;
use App\Models\KategoriAgensi;
use App\Models\Daerah;
use App\Models\Negeri;

class AgensiController extends Controller
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
        $kategori = KategoriAgensi::all();
        $kat2 = KategoriAgensi::all();
        $agensi = Agensi::all();

        return view('utiliti.kumpulan.agensi.index',[
            'agensi'=>$agensi,
            'kategori'=>$kategori,
            'kat2'=>$kat2
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriAgensi::all();
        $daerah = Daerah::all();
        $negeri = Negeri::all();
        return view('utiliti.kumpulan.agensi.create',[
            'kategori'=>$kategori,
            'daerah'=>$daerah,
            'negeri'=>$negeri
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAgensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgensiRequest $request)
    {
        $agensi = new Agensi;
        $agensi->kategori_agensi = $request->kategori_agensi;
        $agensi->no_KP_Agensi = $request->no_KP_Agensi;
        $agensi->nama_Agensi = $request->nama_Agensi;
        $agensi->alamat_Agensi_baris1 = $request->alamat_Agensi_baris1;
        $agensi->alamat_Agensi_baris2 = $request->alamat_Agensi_baris2;
        $agensi->alamat_Agensi_baris3 = $request->alamat_Agensi_baris3;
        $agensi->poskod = $request->poskod;
        $agensi->no_Telefon_Agensi = $request->no_Telefon_Agensi;
        $agensi->no_Faks_Agensi = $request->no_Faks_Agensi;
        $agensi->website_Agensi = $request->website_Agensi;
        $agensi->U_Negeri_ID = $request->U_Negeri_ID;
        $agensi->U_Daerah_ID = $request->U_Daerah_ID;

        $agensi->save();
        alert()->success('Maklumat telah ditambah', 'Berjaya');
        AuditTrailController::audit('utiliti', 'agensi', 'cipta', $agensi->nama_Agensi);
        return redirect('/utiliti/kumpulan/agensi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agensi  $agensi
     * @return \Illuminate\Http\Response
     */
    public function show(Agensi $agensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agensi  $agensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Agensi $agensi)
    {
        $daerah = Daerah::with('negeri')->get();
        $negeri = Negeri::all();
        $kategori = KategoriAgensi::all();
        return view('utiliti.kumpulan.agensi.edit',[
            'agensi'=>$agensi,
            'daerah'=>$daerah,
            'negeri'=>$negeri,
            'kategori'=>$kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAgensiRequest  $request
     * @param  \App\Models\Agensi  $agensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgensiRequest $request, Agensi $agensi)
    {
        $agensi->kategori_agensi = $request->kategori_agensi;
        $agensi->no_KP_Agensi = $request->no_KP_Agensi;
        $agensi->nama_Agensi = $request->nama_Agensi;
        $agensi->alamat_Agensi_baris1 = $request->alamat_Agensi_baris1;
        $agensi->alamat_Agensi_baris2 = $request->alamat_Agensi_baris2;
        $agensi->alamat_Agensi_baris3 = $request->alamat_Agensi_baris3;
        $agensi->poskod = $request->poskod;
        $agensi->no_Telefon_Agensi = $request->no_Telefon_Agensi;
        $agensi->no_Faks_Agensi = $request->no_Faks_Agensi;
        $agensi->website_Agensi = $request->website_Agensi;
        $agensi->U_Negeri_ID = $request->U_Negeri_ID;
        $agensi->U_Daerah_ID = $request->U_Daerah_ID;

        $agensi->save();
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        AuditTrailController::audit('utiliti', 'agensi', 'kemaskini', $agensi->nama_Agensi);

        return redirect('/utiliti/kumpulan/agensi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agensi  $agensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agensi $agensi)
    {
        $nama = $agensi->nama_Agensi;
        $agensi->delete();
        alert()->success('Maklumat telah dihapus', 'Berjaya');
        AuditTrailController::audit('utiliti', 'agensi', 'hapus', $nama);
        return redirect('/utiliti/kumpulan/agensi');
    }
}
