<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNegeriRequest;
use App\Http\Requests\UpdateNegeriRequest;
use App\Models\Negeri;

class NegeriController extends Controller
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
        $negeri = Negeri::all();
        $bil_neg = Negeri::orderBy('id', 'desc')->first();
        if ($bil_neg != null) {
            $bil = $bil_neg->Negeri_Rkod;
        }else{
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('utiliti.lokasi.negeri.index', [
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
        return view('negeri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNegeriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNegeriRequest $request)
    {
        $negeri = new Negeri;
        $negeri->Negeri_Rkod = $request->Negeri_Rkod;
        $negeri->U_Negeri_ID = $request->U_Negeri_ID;
        $negeri->Negeri = $request->Negeri;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $negeri->status_negeri = $status;

        $negeri->save();
        AuditTrailController::audit('utiliti','negeri','cipta', $negeri->Negeri);
        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/utiliti/lokasi/negeri');
    }


    public function show(Negeri $negeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Negeri  $negeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Negeri $negeri)
    {
        return view('negeri.edit', [
            'negeri' => $negeri
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNegeriRequest  $request
     * @param  \App\Models\Negeri  $negeri
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNegeriRequest $request, Negeri $negeri)
    {
        $negeri->Negeri_Rkod = $request->Negeri_Rkod;
        $negeri->U_Negeri_ID = $request->U_Negeri_ID;
        $negeri->Negeri = $request->Negeri;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $negeri->status_negeri = $status;

        $negeri->save();
        AuditTrailController::audit('utiliti','negeri','cipta', $negeri->Negeri);
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        return redirect('/utiliti/lokasi/negeri');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Negeri  $negeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Negeri $negeri)
    {
        $nama = $negeri->Negeri;
        try {
            $negeri->delete();
        } catch (\Throwable $th) {
            alert()->error('Maklumat berkait dengan rekod di bahagian lain, sila hapuskan rekod di bahagian tersebut dahulu.', 'Tidak Berjaya')->persistent('Tutup');
            return back();
        }
        AuditTrailController::audit('utiliti','negeri','hapus', $nama);
        alert()->success('Maklumat telah dihapus', 'Berjaya');
        return redirect('/utiliti/lokasi/negeri');
    }
}
