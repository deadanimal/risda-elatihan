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
        $kampung = Kampung::all();

        $seksyen = Seksyen::with(['negeri', 'daerah', 'mukim'])->get();

        return view('utiliti.lokasi.seksyen.index', [
            'negeri' => $negeri,
            'neg2' => $neg2,
            'daerah' => $daerah,
            'dae2' => $dae2,
            'mukim' => $mukim,
            'muk2' => $muk2,
            'seksyen' => $seksyen,
            'kampung' => $kampung
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
        AuditTrailController::audit('utiliti', 'seksyen', 'cipta', $seksyen->Seksyen);
        alert()->success('Maklumat telah disimpan', 'Berjaya');
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
        AuditTrailController::audit('utiliti', 'seksyen', 'kemaskini', $seksyen->Seksyen);
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
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
        $nama = $seksyen->Seksyen;
        try {
            $seksyen->delete();
        } catch (\Throwable $th) {
            alert()->error('Maklumat berkait dengan rekod di bahagian lain, sila hapuskan rekod di bahagian tersebut dahulu.', 'Tidak Berjaya')->persistent('Tutup');
            return back();
        }
        AuditTrailController::audit('utiliti', 'seksyen', 'hapus', $nama);
        alert()->success('Maklumat telah dihapuskan', 'Berjaya');
        return redirect('/utiliti/lokasi/seksyen');
    }

    public function filter()
    {
        $negeri = $_GET['negeri'];
        $daerah = $_GET['daerah'];
        $mukim = $_GET['mukim'];

        if ($negeri != null) {
            if ($daerah != null) {
                if ($mukim != null) {
                    $seksyen = Seksyen::with(['kampung', 'negeri', 'daerah', 'mukim'])->where('U_Negeri_ID', $negeri)->where('U_Daerah_ID', $daerah)->where('U_Mukim_ID', $mukim)->get();
                } else {
                    $seksyen = Seksyen::with(['kampung', 'negeri', 'daerah', 'mukim'])->where('U_Negeri_ID', $negeri)->where('U_Daerah_ID', $daerah)->get();
                }
            } else {
                if ($mukim != null) {
                    $seksyen = Seksyen::with(['kampung', 'negeri', 'daerah', 'mukim'])->where('U_Negeri_ID', $negeri)->where('U_Mukim_ID', $mukim)->get();
                } else {
                    $seksyen = Seksyen::with(['kampung', 'negeri', 'daerah', 'mukim'])->where('U_Negeri_ID', $negeri)->get();
                }
            }
        } else {
            if ($daerah != null) {
                if ($mukim != null) {
                    $seksyen = Seksyen::with(['kampung', 'negeri', 'daerah', 'mukim'])->where('U_Daerah_ID', $daerah)->where('U_Mukim_ID', $mukim)->get();
                } else {
                    $seksyen = Seksyen::with(['kampung', 'negeri', 'daerah', 'mukim'])->where('U_Daerah_ID', $daerah)->get();
                }
            } else {
                if ($mukim != null) {
                    $seksyen = Seksyen::with(['kampung', 'negeri', 'daerah', 'mukim'])->where('U_Mukim_ID', $mukim)->get();
                } else {
                    $seksyen = Seksyen::with(['kampung', 'negeri', 'daerah', 'mukim'])->get();
                }
            }
        }

        return response()->json($seksyen);
    }
}
