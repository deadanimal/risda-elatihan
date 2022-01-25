<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBangsaRequest;
use App\Http\Requests\UpdateBangsaRequest;
use App\Models\Bangsa;

class BangsaController extends Controller
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
        $bangsa = Bangsa::all();
        $bil_bangsa = Bangsa::orderBy('id', 'desc')->first();
        if ($bil_bangsa != null) {
            $bil = $bil_bangsa->kod_Bangsa;
        }else{
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('utiliti.generik.bangsa.index', [
            'bangsa'=>$bangsa,
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
     * @param  \App\Http\Requests\StoreBangsaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBangsaRequest $request)
    {
        $bangsa = new Bangsa;
        $bangsa->kod_Bangsa = $request->kod_Bangsa;
        $bangsa->nama_Bangsa = $request->nama_Bangsa;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $bangsa->status_bangsa = $status;

        $bangsa->save();
        return redirect('/utiliti/generik/bangsa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bangsa  $bangsa
     * @return \Illuminate\Http\Response
     */
    public function show(Bangsa $bangsa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bangsa  $bangsa
     * @return \Illuminate\Http\Response
     */
    public function edit(Bangsa $bangsa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBangsaRequest  $request
     * @param  \App\Models\Bangsa  $bangsa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBangsaRequest $request, Bangsa $bangsa)
    {
        $bangsa->kod_Bangsa = $request->kod_Bangsa;
        $bangsa->nama_Bangsa = $request->nama_Bangsa;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $bangsa->status_bangsa = $status;

        $bangsa->save();
        return redirect('/utiliti/generik/bangsa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bangsa  $bangsa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bangsa $bangsa)
    {
        $bangsa->delete();
        return redirect('/utiliti/generik/bangsa');
    }
}
