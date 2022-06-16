<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreObjekRequest;
use App\Http\Requests\UpdateObjekRequest;
use App\Models\Objek;

class ObjekController extends Controller
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
        $objek = Objek::all();
        $bil_obj = Objek::orderBy('id', 'desc')->first();
        if ($bil_obj != null) {
            $bil = $bil_obj->kod_Objek;
        } else {
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('utiliti.kursus.objek.index', [
            'bil' => $bil,
            'objek' => $objek
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
     * @param  \App\Http\Requests\StoreObjekRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreObjekRequest $request)
    {
        $objek = new Objek;
        $objek->kod_Objek = $request->kod_Objek;
        $objek->nama_Objek = $request->nama_Objek;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $objek->status_Objek = $status;

        $objek->save();
        AuditTrailController::audit('utiliti', 'kod objek', 'cipta', $objek->nama_Objek);
        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/utiliti/kursus/kod_objek');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Objek  $objek
     * @return \Illuminate\Http\Response
     */
    public function show(Objek $objek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Objek  $objek
     * @return \Illuminate\Http\Response
     */
    public function edit(Objek $objek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateObjekRequest  $request
     * @param  \App\Models\Objek  $objek
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateObjekRequest $request, $objek)
    {
        $objek = Objek::find($objek);
        $objek->kod_Objek = $request->kod_Objek;
        $objek->nama_Objek = $request->nama_Objek;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $objek->status_Objek = $status;

        $objek->save();
        AuditTrailController::audit('utiliti', 'kod objek', 'kemaskini', $objek->nama_Objek);
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        return redirect('/utiliti/kursus/kod_objek');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Objek  $objek
     * @return \Illuminate\Http\Response
     */
    public function destroy($objek)
    {
        $objek = Objek::find($objek);
        $nama = $objek->nama_Objek;
        $objek->delete();
        AuditTrailController::audit('utiliti','kod objek','hapus', $nama);
        alert()->success('Maklumat telah dihapuskan', 'Berjaya');
        return redirect('/utiliti/kursus/kod_objek');
    }
}
