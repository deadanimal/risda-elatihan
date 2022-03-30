<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKampungRequest;
use App\Http\Requests\UpdateKampungRequest;
use App\Models\Kampung;
use App\Models\Mukim;
use App\Models\Daerah;
use App\Models\Negeri;

class KampungController extends Controller
{
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

        $kampung = Negeri::join('daerahs', 'negeris.id', 'daerahs.U_Negeri_ID')
        ->join('mukims', 'daerahs.id', 'mukims.U_Daerah_ID')
        ->join('kampungs', 'mukims.id', 'kampungs.U_Mukim_ID')
        ->get();
        
        $bil_kam = Kampung::orderBy('id', 'desc')->first();
        if ($bil_kam != null) {
            $bil = $bil_kam->Kampung_kod;
        }else{
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('utiliti.lokasi.kampung.index', [
            'negeri' => $negeri,
            'neg2' => $neg2,
            'daerah' => $daerah,
            'dae2' => $dae2,
            'mukim' => $mukim,
            'muk2' => $muk2,
            'kampung' => $kampung,
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
     * @param  \App\Http\Requests\StoreKampungRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKampungRequest $request)
    {
        $kampung = new Kampung;
        $kampung->U_Negeri_ID = $request->U_Negeri_ID;
        $kampung->U_Daerah_ID = $request->U_Daerah_ID;
        $kampung->U_Mukim_ID = $request->U_Mukim_ID;
        $kampung->Kampung_kod = $request->Kampung_kod;
        $kampung->Kampung = $request->Kampung;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $kampung->status_kampung = $status;
        $kampung->save();
        return redirect('/utiliti/lokasi/kampung');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kampung  $kampung
     * @return \Illuminate\Http\Response
     */
    public function show(Kampung $kampung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kampung  $kampung
     * @return \Illuminate\Http\Response
     */
    public function edit(Kampung $kampung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKampungRequest  $request
     * @param  \App\Models\Kampung  $kampung
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKampungRequest $request, Kampung $kampung)
    {
        $kampung->U_Negeri_ID = $request->U_Negeri_ID;
        $kampung->U_Daerah_ID = $request->U_Daerah_ID;
        $kampung->U_Mukim_ID = $request->U_Mukim_ID;
        $kampung->Kampung_kod = $request->Kampung_kod;
        $kampung->Kampung = $request->Kampung;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $kampung->status_kampung = $status;
        $kampung->save();
        return redirect('/utiliti/lokasi/kampung');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kampung  $kampung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kampung $kampung)
    {
        $kampung->delete();
        return redirect('/utiliti/lokasi/kampung');
    }
}
