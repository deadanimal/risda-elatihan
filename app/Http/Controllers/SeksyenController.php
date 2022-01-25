<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSeksyenRequest;
use App\Http\Requests\UpdateSeksyenRequest;
use App\Models\Seksyen;
use App\Models\Kampung;
use App\Models\Mukim;
use App\Models\Daerah;
use App\Models\Negeri;

class SeksyenController extends Controller
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
        $neg2 = Negeri::all();
        $daerah = Daerah::all();
        $dae2 = Daerah::all();
        $mukim = Mukim::all();
        $muk2 = Mukim::all();

        $seksyen = Negeri::join('daerahs', 'negeris.id', 'daerahs.U_Negeri_ID')
        ->join('mukims', 'daerahs.id', 'mukims.U_Daerah_ID')
        ->join('seksyens', 'mukims.id', 'seksyens.U_Mukim_ID')
        ->get();
        
        $bil_seksyen = Seksyen::orderBy('id', 'desc')->first();
        if ($bil_seksyen != null) {
            $bil = $bil_seksyen->Seksyen_kod;
        }else{
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('utiliti.lokasi.seksyen.index', [
            'negeri' => $negeri,
            'neg2' => $neg2,
            'daerah' => $daerah,
            'dae2' => $dae2,
            'mukim' => $mukim,
            'muk2' => $muk2,
            'seksyen' => $seksyen,
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
     * @param  \App\Http\Requests\StoreSeksyenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeksyenRequest $request)
    {
        $seksyen = new Seksyen;
        $seksyen->U_Negeri_ID = $request->U_Negeri_ID;
        $seksyen->U_Daerah_ID = $request->U_Daerah_ID;
        $seksyen->U_Mukim_ID = $request->U_Mukim_ID;
        $seksyen->Seksyen_kod = $request->Seksyen_kod;
        $seksyen->Kampung = $request->Kampung;
        $seksyen->Seksyen = $request->Seksyen;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $seksyen->status_seksyen = $status;
        $seksyen->save();
        return redirect('/utiliti/lokasi/seksyen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seksyen  $seksyen
     * @return \Illuminate\Http\Response
     */
    public function show(Seksyen $seksyen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seksyen  $seksyen
     * @return \Illuminate\Http\Response
     */
    public function edit(Seksyen $seksyen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSeksyenRequest  $request
     * @param  \App\Models\Seksyen  $seksyen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSeksyenRequest $request, Seksyen $seksyen)
    {
        $seksyen->U_Negeri_ID = $request->U_Negeri_ID;
        $seksyen->U_Daerah_ID = $request->U_Daerah_ID;
        $seksyen->U_Mukim_ID = $request->U_Mukim_ID;
        $seksyen->Seksyen_kod = $request->Seksyen_kod;
        $seksyen->Kampung = $request->Kampung;
        $seksyen->Seksyen = $request->Seksyen;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $seksyen->status_seksyen = $status;
        $seksyen->save();
        return redirect('/utiliti/lokasi/seksyen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seksyen  $seksyen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seksyen $seksyen)
    {
        $seksyen->delete();
        return redirect('/utiliti/lokasi/seksyen');
    }
}
