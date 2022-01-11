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
        return view('negeri.index', [
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
        $negeri->Negeri = $request->Negeri;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $negeri->status = $status;

        $negeri->save();
        return redirect('/utiliti/negeri');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Negeri  $negeri
     * @return \Illuminate\Http\Response
     */
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
        $negeri->Negeri = $request->Negeri;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $negeri->status = $status;

        $negeri->save();
        return redirect('/utiliti/negeri');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Negeri  $negeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Negeri $negeri)
    {
        $negeri->delete();
        return redirect('/utiliti/negeri');
    }
}
