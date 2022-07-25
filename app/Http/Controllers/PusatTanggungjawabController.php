<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePusatTanggungjawabRequest;
use App\Http\Requests\UpdatePusatTanggungjawabRequest;
use App\Models\PusatTanggungjawab;
use App\Models\Negeri;

class PusatTanggungjawabController extends Controller
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
        $pt_data = PusatTanggungjawab::with('negeri')->get();
        $negeri = Negeri::all();
        $bil_pt = PusatTanggungjawab::with('negeri')->orderBy('id', 'desc')->first();
        if ($bil_pt != null) {
            $bil = $bil_pt->kod_PT;
        } else {
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('utiliti.lokasi.pusat_tanggungjawab.index', [
            'pt_data' => $pt_data,
            'negeri' => $negeri,
            'bil' => $bil
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
     * @param  \App\Http\Requests\StorePusatTanggungjawabRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePusatTanggungjawabRequest $request)
    {
        $pusatTanggungjawab = new PusatTanggungjawab;
        $pusatTanggungjawab->kod_PT = $request->kod_PT;
        $pusatTanggungjawab->nama_PT = $request->nama_PT;
        $pusatTanggungjawab->alamat_PT_baris1 = $request->alamat_PT_baris1;
        $pusatTanggungjawab->alamat_PT_baris2 = $request->alamat_PT_baris2;
        $pusatTanggungjawab->alamat_PT_baris3 = $request->alamat_PT_baris3;
        $pusatTanggungjawab->alamat_PT_baris4 = $request->alamat_PT_baris4;
        $pusatTanggungjawab->no_Telefon_PT = $request->no_Telefon_PT;
        $pusatTanggungjawab->no_Faks_PT = $request->no_Faks_PT;
        $pusatTanggungjawab->kod_Negeri_PT = $request->kod_Negeri_PT;
        $pusatTanggungjawab->keterangan_PT = $request->keterangan_PT;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $pusatTanggungjawab->status_PT = $status;

        $pusatTanggungjawab->save();
        AuditTrailController::audit('utiliti', 'pusat tanggungjawab', 'cipta', $pusatTanggungjawab->nama_PT);
        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/utiliti/lokasi/pusat_tanggungjawab');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PusatTanggungjawab  $pusatTanggungjawab
     * @return \Illuminate\Http\Response
     */
    public function show(PusatTanggungjawab $pusatTanggungjawab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PusatTanggungjawab  $pusatTanggungjawab
     * @return \Illuminate\Http\Response
     */
    public function edit(PusatTanggungjawab $pusatTanggungjawab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePusatTanggungjawabRequest  $request
     * @param  \App\Models\PusatTanggungjawab  $pusatTanggungjawab
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePusatTanggungjawabRequest $request, PusatTanggungjawab $pusatTanggungjawab)
    {
        $pusatTanggungjawab->kod_PT = $request->kod_PT;
        $pusatTanggungjawab->nama_PT = $request->nama_PT;
        $pusatTanggungjawab->alamat_PT_baris1 = $request->alamat_PT_baris1;
        $pusatTanggungjawab->alamat_PT_baris2 = $request->alamat_PT_baris2;
        $pusatTanggungjawab->alamat_PT_baris3 = $request->alamat_PT_baris3;
        $pusatTanggungjawab->alamat_PT_baris4 = $request->alamat_PT_baris4;
        $pusatTanggungjawab->no_Telefon_PT = $request->no_Telefon_PT;
        $pusatTanggungjawab->no_Faks_PT = $request->no_Faks_PT;
        $pusatTanggungjawab->kod_Negeri_PT = $request->kod_Negeri_PT;
        $pusatTanggungjawab->keterangan_PT = $request->keterangan_PT;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $pusatTanggungjawab->status_PT = $status;

        $pusatTanggungjawab->save();
        AuditTrailController::audit('utiliti', 'pusat tanggungjawab', 'kemaskini', $pusatTanggungjawab->nama_PT);
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        return redirect('/utiliti/lokasi/pusat_tanggungjawab');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PusatTanggungjawab  $pusatTanggungjawab
     * @return \Illuminate\Http\Response
     */
    public function destroy(PusatTanggungjawab $pusatTanggungjawab)
    {
        $nama = $pusatTanggungjawab->nama_PT;
        try {
            $pusatTanggungjawab->delete();
        } catch (\Throwable $th) {
            alert()->error('Maklumat berkait dengan rekod di bahagian lain, sila hapuskan rekod di bahagian tersebut dahulu.', 'Tidak Berjaya')->persistent('Tutup');
            return back();
        }
        AuditTrailController::audit('utiliti', 'pusat tanggungjawab', 'hapus', $nama);
        alert()->success('Maklumat telah dihapuskan', 'Berjaya');
        return redirect('/utiliti/lokasi/pusat_tanggungjawab');
    }
}
