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

        $mukim = Mukim::with(['negeri', 'daerah'])->get();

        return view('utiliti.lokasi.mukim.index', [
            'negeri' => $negeri,
            'neg2' => $neg2,
            'daerah' => $daerah,
            'dae2' => $dae2,
            'mukim' => $mukim,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mukim.create');
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
        $mukim->Kod_Mukim = $request->Kod_Mukim;
        $mukim->U_Mukim_ID = $mukim->U_Negeri_ID.$mukim->U_Daerah_ID.$mukim->Kod_Mukim;

        $mukim->Mukim = $request->Mukim;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $mukim->status_mukim = $status;
        // dd($mukim);
        $mukim->save();
        AuditTrailController::audit('utiliti','mukim','cipta', $mukim->Mukim);
        alert()->success('Maklumat telah disimpan','Berjaya');
        return redirect('/utiliti/lokasi/mukim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mukim  $mukim
     * @return \Illuminate\Http\Response
     */
    public function show(Mukim $mukim)
    {
        return $mukim;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mukim  $mukim
     * @return \Illuminate\Http\Response
     */
    public function edit(Mukim $mukim)
    {
        return view('mukim.edit', [
            'mukim' => $mukim
        ]);
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
        $mukim->save();
        AuditTrailController::audit('utiliti','mukim','kemaskini', $mukim->Mukim);
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        return redirect('/utiliti/lokasi/mukim');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mukim  $mukim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mukim $mukim)
    {
        $nama = $mukim->Mukim;
        try {
            $mukim->delete();
        } catch (\Throwable $th) {
            alert()->error('Maklumat berkait dengan rekod di bahagian lain, sila hapuskan rekod di bahagian tersebut dahulu.', 'Tidak Berjaya')->persistent('Tutup');
            return back();
        }
        AuditTrailController::audit('utiliti','mukim','hapus', $nama);
        alert()->success('Maklumat telah dihapus', 'Berjaya');
        return redirect('/utiliti/lokasi/mukim');
    }

    public function filter()
    {
        $negeri = $_GET['negeri'];
        $daerah = $_GET['daerah'];

        if ($negeri != null) {
            if ($daerah != null) {
                $dun = Mukim::where('U_Negeri_ID', $negeri)->where('U_Daerah_ID', $daerah)->get();
            } else {
                $dun = Mukim::where('U_Negeri_ID', $negeri)->get();
            }

        } else {
            if ($daerah != null) {
                $dun = Mukim::where('U_Daerah_ID', $daerah)->get();
            } else {
                $dun = Mukim::all();
            }
        }


        return response()->json($dun);
    }
}
