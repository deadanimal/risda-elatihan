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
        $daerah = Daerah::all();
        $mukim = Mukim::all();
        $kampung = Kampung::with(['negeri','daerah', 'mukim'])->first();
        
        // dd($negeri, $daerah, $mukim, $kampung);
        return view('utiliti.lokasi.kampung.index', [
            'negeri' => $negeri,
            'daerah' => $daerah,
            'mukim' => $mukim,
            'kampung' => $kampung,
        ]);
    }

    public function main()
    {
        $negeri = Negeri::all();
        $daerah = Daerah::all();
        $mukim = Mukim::all();
        $kampung = Kampung::with(['negeri','daerah', 'mukim'])->first();
        
        dd($negeri, $daerah, $mukim, $kampung);
        return view('utiliti.lokasi.kampung.index', [
            'negeri' => $negeri,
            'daerah' => $daerah,
            'mukim' => $mukim,
            'kampung' => $kampung,
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
        AuditTrailController::audit('utiliti','kampung','cipta', $kampung->Kampung);
        alert()->success('Maklumat telah disimpan', 'Berjaya');
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
        AuditTrailController::audit('utiliti','kampung','kemaskini', $kampung->Kampung);
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
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
        $nama = $kampung->Kampung;
        try {
            $kampung->delete();
        } catch (\Throwable $th) {
            alert()->error('Maklumat berkait dengan rekod di bahagian lain, sila hapuskan rekod di bahagian tersebut dahulu.', 'Tidak Berjaya')->persistent('Tutup');
            return back();
        }
        AuditTrailController::audit('utiliti','kampung','hapus', $nama);
        alert()->success('Maklumat telah dihapus', 'Berjaya');
        return redirect('/utiliti/lokasi/kampung');
    }

    public function filter()
    {
        $negeri = $_GET['negeri'];
        $daerah = $_GET['daerah'];
        $mukim = $_GET['mukim'];

        if ($negeri != null) {
            if ($daerah != null) {
                if ($mukim != null) {
                    $kampung = Kampung::with(['negeri','daerah', 'mukim'])->where('U_Negeri_ID', $negeri)->where('U_Daerah_ID', $daerah)->where('U_Mukim_ID', $mukim)->get();
                } else {
                    $kampung = Kampung::with(['negeri','daerah', 'mukim'])->where('U_Negeri_ID', $negeri)->where('U_Daerah_ID', $daerah)->get();
                }
            } else {
                if ($mukim != null) {
                    $kampung = Kampung::with(['negeri','daerah', 'mukim'])->where('U_Negeri_ID', $negeri)->where('U_Mukim_ID', $mukim)->get();
                } else {
                    $kampung = Kampung::with(['negeri','daerah', 'mukim'])->where('U_Negeri_ID', $negeri)->get();
                }
            }
        } else {
            if ($daerah != null) {
                if ($mukim != null) {
                    $kampung = Kampung::with(['negeri','daerah', 'mukim'])->where('U_Daerah_ID', $daerah)->where('U_Mukim_ID', $mukim)->get();
                } else {
                    $kampung = Kampung::with(['negeri','daerah', 'mukim'])->where('U_Daerah_ID', $daerah)->get();
                }
            } else {
                if ($mukim != null) {
                    $kampung = Kampung::with(['negeri','daerah', 'mukim'])->where('U_Mukim_ID', $mukim)->get();
                } else {
                    $kampung = Kampung::with(['negeri','daerah', 'mukim'])->get();
                }
            }
        }

        return response()->json($kampung);
    }
}
