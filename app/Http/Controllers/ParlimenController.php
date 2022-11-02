<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParlimenRequest;
use App\Http\Requests\UpdateParlimenRequest;
use App\Models\Parlimen;
use App\Models\Negeri;

class ParlimenController extends Controller
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
        $parlimen = Parlimen::with('negeri')->get();

        return view('utiliti.lokasi.parlimen.index', [
            'negeri' => $negeri,
            'neg2' => $neg2,
            'parlimen' => $parlimen,
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
     * @param  \App\Http\Requests\StoreParlimenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParlimenRequest $request)
    {
        $parlimen = new Parlimen;
        $parlimen->U_Negeri_ID = $request->U_Negeri_ID;
        $parlimen->Parlimen_kod = $request->Parlimen_kod;
        $parlimen->U_Parlimen_ID = $parlimen->U_Negeri_ID.$parlimen->Parlimen_kod;
        $parlimen->Parlimen = $request->Parlimen;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $parlimen->status_parlimen = $status;
        $parlimen->save();
        AuditTrailController::audit('utiliti','parlimen','cipta', $parlimen->Parlimen);
        alert()->success('Maklumat telah disimpan','Berjaya');
        return redirect('/utiliti/lokasi/parlimen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parlimen  $parlimen
     * @return \Illuminate\Http\Response
     */
    public function show(Parlimen $parlimen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parlimen  $parlimen
     * @return \Illuminate\Http\Response
     */
    public function edit(Parlimen $parlimen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParlimenRequest  $request
     * @param  \App\Models\Parlimen  $parlimen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParlimenRequest $request, $parlimen)
    {
        $parlimen = Parlimen::find($parlimen);
        $parlimen->U_Negeri_ID = $request->U_Negeri_ID;
        $parlimen->Parlimen_kod = $request->Parlimen_kod;
        $parlimen->Parlimen = $request->Parlimen;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $parlimen->status_parlimen = $status;
        $parlimen->save();
        AuditTrailController::audit('utiliti','parlimen','kemaskini', $parlimen->Parlimen);
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        return redirect('/utiliti/lokasi/parlimen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parlimen  $parlimen
     * @return \Illuminate\Http\Response
     */
    public function destroy( $parlimen)
    {
        $parlimen = Parlimen::find($parlimen);
        $nama = $parlimen->Parlimen;
        try {
            $parlimen->delete();
        } catch (\Throwable $th) {
            alert()->error('Maklumat berkait dengan rekod di bahagian lain, sila hapuskan rekod di bahagian tersebut dahulu.', 'Tidak Berjaya')->persistent('Tutup');
            return back();
        }
        AuditTrailController::audit('utiliti','parlimen','hapus', $nama);
        alert()->success('Maklumat telah dihapuskan', 'Berjaya');
        return redirect('/utiliti/lokasi/parlimen');
    }

    public function filter()
    {
        $negeri = $_GET['negeri'];
        $parlimen = Parlimen::where('U_Negeri_ID', $negeri)->get();

        return response()->json($parlimen);
    }
}
