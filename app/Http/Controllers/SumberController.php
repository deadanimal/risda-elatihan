<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSumberRequest;
use App\Http\Requests\UpdateSumberRequest;
use App\Models\Sumber;

class SumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sumber = Sumber::all();
        $bil_sumber = Sumber::orderBy('id', 'desc')->first();
        if ($bil_sumber != null) {
            $bil = $bil_sumber->kod_Sumber;
        }else{
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('utiliti.generik.sumber.index', [
            'sumber'=>$sumber,
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
     * @param  \App\Http\Requests\StoreSumberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSumberRequest $request)
    {
        $sumber = new Sumber;
        $sumber->kod_Sumber = $request->kod_Sumber;
        $sumber->nama_Sumber = $request->nama_Sumber;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $sumber->status_sumber = $status;

        $sumber->save();
        return redirect('/utiliti/sumber');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sumber  $sumber
     * @return \Illuminate\Http\Response
     */
    public function show(Sumber $sumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sumber  $sumber
     * @return \Illuminate\Http\Response
     */
    public function edit(Sumber $sumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSumberRequest  $request
     * @param  \App\Models\Sumber  $sumber
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSumberRequest $request, Sumber $sumber)
    {
        $sumber->kod_Sumber = $request->kod_Sumber;
        $sumber->nama_Sumber = $request->nama_Sumber;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $sumber->status_sumber = $status;

        $sumber->save();
        return redirect('/utiliti/sumber');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sumber  $sumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sumber $sumber)
    {
        $sumber->delete();
        return redirect('/utiliti/sumber');
    }
}
