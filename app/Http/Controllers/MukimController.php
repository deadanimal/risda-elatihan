<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMukimRequest;
use App\Http\Requests\UpdateMukimRequest;
use App\Models\Mukim;
use App\Models\Daerah;
use App\Models\Negeri;

class MukimController extends Controller
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

        $mukim = Mukim::join('negeris', 'mukims.U_Negeri_ID', 'negeris.id')
        ->join('daerahs', 'mukims.U_Daerah_ID', 'daerahs.id')
        ->get();
        
        $bil_muk = Mukim::orderBy('id', 'desc')->first();
        if ($bil_muk != null) {
            $bil = $bil_muk->Daerah_Rkod;
        }else{
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('mukim.index', [
            'negeri' => $negeri,
            'neg2' => $neg2,
            'daerah' => $daerah,
            'dae2' => $dae2,
            'mukim' => $mukim,
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
     * @param  \App\Http\Requests\StoreMukimRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMukimRequest $request)
    {
        $mukim = new Mukim;
        $mukim->U_Negeri_ID = $request->U_Negeri_ID;
        $mukim->U_Daerah_ID = $request->U_Daerah_ID;
        $mukim->Mukim_Rkod = $request->Mukim_Rkod;
        $mukim->Mukim = $request->Mukim;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $mukim->status_mukim = $status;
        // dd($mukim);
        $mukim->save();
        return redirect('/utiliti/mukim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mukim  $mukim
     * @return \Illuminate\Http\Response
     */
    public function show(Mukim $mukim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mukim  $mukim
     * @return \Illuminate\Http\Response
     */
    public function edit(Mukim $mukim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMukimRequest  $request
     * @param  \App\Models\Mukim  $mukim
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMukimRequest $request, Mukim $mukim)
    {
        $mukim->U_Negeri_ID = $request->U_Negeri_ID;
        $mukim->U_Daerah_ID = $request->U_Daerah_ID;
        $mukim->Mukim_Rkod = $request->Mukim_Rkod;
        $mukim->Mukim = $request->Mukim;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $mukim->status_mukim = $status;
        // dd($mukim);
        $mukim->save();
        return redirect('/utiliti/mukim');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mukim  $mukim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mukim $mukim)
    {
        $mukim->delete();
        return redirect('/utiliti/mukim');
    }
}
