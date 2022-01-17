<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStesenRequest;
use App\Http\Requests\UpdateStesenRequest;
use App\Models\Stesen;
use App\Models\Kampung;
use App\Models\Mukim;
use App\Models\Daerah;
use App\Models\Negeri;

class StesenController extends Controller
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
        $kampung = Kampung::all();
        $kam2 = Kampung::all();

        $stesen = Negeri::join('daerahs', 'negeris.id', 'daerahs.U_Negeri_ID')
        ->join('mukims', 'daerahs.id', 'mukims.U_Daerah_ID')
        ->join('kampungs', 'mukims.id', 'kampungs.U_Mukim_ID')
        ->join('stesens', 'kampungs.id', 'stesens.U_Kampung_ID')
        ->get();
        // dd($stesen);
        $bil_Stesen = Stesen::orderBy('id', 'desc')->first();
        if ($bil_Stesen != null) {
            $bil = $bil_Stesen->Stesen_kod;
        }else{
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('utiliti.lokasi.stesen.index', [
            'negeri' => $negeri,
            'neg2' => $neg2,
            'daerah' => $daerah,
            'dae2' => $dae2,
            'mukim' => $mukim,
            'muk2' => $muk2,
            'kampung' => $kampung,
            'kam2' => $kam2,
            'stesen' => $stesen,
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
     * @param  \App\Http\Requests\StoreStesenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStesenRequest $request)
    {
        $Stesen = new Stesen;
        $Stesen->U_Negeri_ID = $request->U_Negeri_ID;
        $Stesen->U_Daerah_ID = $request->U_Daerah_ID;
        $Stesen->U_Mukim_ID = $request->U_Mukim_ID;
        $Stesen->U_Kampung_ID = $request->U_Kampung_ID;
        // $Stesen->U_PT_ID = $request->U_PT_ID;
        $Stesen->Stesen_kod = $request->Stesen_kod;
        $Stesen->Stesen = $request->Stesen;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $Stesen->status_stesen = $status;
        $Stesen->save();
        return redirect('/utiliti/stesen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stesen  $stesen
     * @return \Illuminate\Http\Response
     */
    public function show(Stesen $stesen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stesen  $stesen
     * @return \Illuminate\Http\Response
     */
    public function edit(Stesen $stesen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStesenRequest  $request
     * @param  \App\Models\Stesen  $stesen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStesenRequest $request, Stesen $Stesen)
    {
        $Stesen->U_Negeri_ID = $request->U_Negeri_ID;
        $Stesen->U_Daerah_ID = $request->U_Daerah_ID;
        $Stesen->U_Mukim_ID = $request->U_Mukim_ID;
        $Stesen->U_Kampung_ID = $request->U_Kampung_ID;
        // $Stesen->U_PT_ID = $request->U_PT_ID;
        $Stesen->Stesen_kod = $request->Stesen_kod;
        $Stesen->Stesen = $request->Stesen;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $Stesen->status_stesen = $status;
        $Stesen->save();
        return redirect('/utiliti/stesen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stesen  $stesen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stesen $stesen)
    {
        $stesen->delete();
        return redirect('/utiliti/stesen');
    }
}
