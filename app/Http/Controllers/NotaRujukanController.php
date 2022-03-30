<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotaRujukanRequest;
use App\Http\Requests\UpdateNotaRujukanRequest;
use App\Models\NotaRujukan;

class NotaRujukanController extends Controller
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
        //
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
     * @param  \App\Http\Requests\StoreNotaRujukanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotaRujukanRequest $request)
    {
        $notaRujukan = new NotaRujukan();
        $notaRujukan->nr_jadual_kursus = $request->nr_jadual_kursus;
        $notaRujukan->nr_nota_rujukan = $request->nr_nota_rujukan;
        $notaRujukan->nr_dokumen = $request->nr_dokumen;
        $nr_dok = time() . '.' . $request->nr_dokumen->extension();

        $request->nr_dokumen->move(public_path('bahan/nota_rujukan'), $nr_dok);
        $notaRujukan->nr_dokumen = 'bahan/nota_rujukan/' . $nr_dok;
        $notaRujukan->save();

        alert()->success('Maklumat berjaya disimpan', 'Berjaya');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotaRujukan  $notaRujukan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notaRujukan = NotaRujukan::where('nr_jadual_kursus', $id)->get();
        return view('pengurusan_kursus.semak_jadual.nota_rujukan', [
            'id' => $id,
            'notaRujukan' => $notaRujukan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotaRujukan  $notaRujukan
     * @return \Illuminate\Http\Response
     */
    public function edit(NotaRujukan $notaRujukan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNotaRujukanRequest  $request
     * @param  \App\Models\NotaRujukan  $notaRujukan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotaRujukanRequest $request, NotaRujukan $notaRujukan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotaRujukan  $notaRujukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotaRujukan $notaRujukan)
    {
        $notaRujukan->delete();
        alert()->success('Maklumat telah dihapuskan', 'Berjaya');
        return back();
    }
}
