<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStesenRequest;
use App\Http\Requests\UpdateStesenRequest;
use App\Models\Stesen;
use App\Models\Kampung;
use App\Models\Mukim;
use App\Models\Daerah;
use App\Models\Negeri;
use App\Models\PusatTanggungjawab;

class StesenController extends Controller
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
        $pusat_tanggungjawab = PusatTanggungjawab::all();
        $stesen = Stesen::with(['negeri', 'pusat_tanggungjawab'])->get();

        return view('utiliti.lokasi.stesen.index', [
            'negeri' => $negeri,
            'pusat_tanggungjawab' => $pusat_tanggungjawab,
            'stesen' => $stesen,
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
     * @param  \App\Http\Requests\StoreStesenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStesenRequest $request)
    {
        $Stesen = new Stesen;
        $Stesen->U_Negeri_ID = $request->U_Negeri_ID;
        $Stesen->U_Daerah_ID = $request->U_Daerah_ID;
        $Stesen->U_Mukim_ID = $request->U_Mukim_ID;
        $Stesen->U_Kampung_ID = $request->U_Kampung_ID;
        // $Stesen->U_PT_ID = $request->U_PT_ID;
        $Stesen->Stesen_kod = $request->Stesen_kod;
        $Stesen->Stesen = $request->Stesen;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $Stesen->status_stesen = $status;
        $Stesen->save();
        AuditTrailController::audit('utiliti', 'stesen', 'cipta', $Stesen->Stesen);
        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/utiliti/lokasi/stesen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stesen  $stesen
     * @return \Illuminate\Http\Response
     */
    public function show(Stesen $stesen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stesen  $stesen
     * @return \Illuminate\Http\Response
     */
    public function edit(Stesen $stesen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStesenRequest  $request
     * @param  \App\Models\Stesen  $stesen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStesenRequest $request, Stesen $Stesen)
    {
        $Stesen->U_Negeri_ID = $request->U_Negeri_ID;
        $Stesen->U_Daerah_ID = $request->U_Daerah_ID;
        $Stesen->U_Mukim_ID = $request->U_Mukim_ID;
        $Stesen->U_Kampung_ID = $request->U_Kampung_ID;
        // $Stesen->U_PT_ID = $request->U_PT_ID;
        $Stesen->Stesen_kod = $request->Stesen_kod;
        $Stesen->Stesen = $request->Stesen;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $Stesen->status_stesen = $status;
        $Stesen->save();
        AuditTrailController::audit('utiliti', 'stesen', 'kemaskini', $Stesen->Stesen);
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        return redirect('/utiliti/lokasi/stesen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stesen  $stesen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stesen $stesen)
    {
        $nama = $stesen->Stesen;
        try {
            $stesen->delete();
        } catch (\Throwable $th) {
            alert()->error('Maklumat berkait dengan rekod di bahagian lain, sila hapuskan rekod di bahagian tersebut dahulu.', 'Tidak Berjaya')->persistent('Tutup');
            return back();
        }
        AuditTrailController::audit('utiliti', 'stesen', 'hapus', $nama);
        alert()->success('Maklumat telah dihapuskan', 'Berjaya');
        return redirect('/utiliti/lokasi/stesen');
    }

    public function filter()
    {
        $negeri = $_GET['negeri'];
        $pusat_tanggungjawab = $_GET['pusat_tanggungjawab'];

        if ($negeri != null) {
            //ADA negeri
            if ($pusat_tanggungjawab != null) {
                //ADA pt
                $stesen = Stesen::with(['negeri', 'pusat_tanggungjawab'])->where('U_Negeri_ID', $negeri)->where('Kod_PT', $pusat_tanggungjawab)->get();

            } else {
                //TIADA pt
                $stesen = Stesen::with(['negeri', 'pusat_tanggungjawab'])->where('U_Negeri_ID', $negeri)->get(); //ABC

            }
            
        } else {
            //TIADA negeri
            if ($pusat_tanggungjawab != null) {
                //ADA pt
                $stesen = Stesen::with(['negeri', 'pusat_tanggungjawab'])->where('Kod_PT', $pusat_tanggungjawab)->get(); //ABD

            } else {
                // TIADA pt
                $stesen = Stesen::with(['negeri', 'pusat_tanggungjawab'])->where('Kod_PT', $pusat_tanggungjawab)->get(); //AB

            }

        }
        
        return response()->json($stesen);
    }
}
