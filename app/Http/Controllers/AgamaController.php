<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgamaRequest;
use App\Http\Requests\UpdateAgamaRequest;
use App\Models\Agama;
use App\Models\AuditTrail;
use Illuminate\Support\Facades\Auth;

class AgamaController extends Controller
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
        $agama = Agama::all();
        $bil_agama = Agama::orderBy('id', 'desc')->first();
        if ($bil_agama != null) {
            $bil = $bil_agama->kod_Agama;
        }else{
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('utiliti.generik.agama.index', [
            'agama'=>$agama,
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
     * @param  \App\Http\Requests\StoreAgamaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgamaRequest $request)
    {
        $agama = new Agama;
        $agama->kod_Agama = $request->kod_Agama;
        $agama->nama_Agama = $request->nama_Agama;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $agama->status_agama = $status;
        $agama->save();

        alert()->success('Maklumat telah dicipta', 'Berjaya');
        AuditTrailController::audit('utiliti', 'agama', 'cipta');
        return redirect('/utiliti/generik/agama');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function show(Agama $agama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function edit(Agama $agama)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAgamaRequest  $request
     * @param  \App\Models\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgamaRequest $request, Agama $agama)
    {
        $agama->kod_Agama = $request->kod_Agama;
        $agama->nama_Agama = $request->nama_Agama;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $agama->status_agama = $status;
        $agama->save();
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        AuditTrailController::audit('utiliti', 'agama', 'kemaskini');
        return redirect('/utiliti/generik/agama');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agama $agama)
    {
        $agama->delete();
        alert()->success('Maklumat telah dihapus', 'Berjaya');
        AuditTrailController::audit('utiliti', 'agama', 'hapus');
        return redirect('/utiliti/generik/agama');
    }
}
