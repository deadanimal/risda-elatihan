<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStesenRequest;
use App\Http\Requests\UpdateStesenRequest;
use App\Models\Stesen;
use App\Models\Kampung;
use App\Models\Mukim;
use App\Models\Daerah;
use App\Models\Negeri;

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
        $neg2 = Negeri::all();
        $daerah = Daerah::all();
        $dae2 = Daerah::all();
        $mukim = Mukim::all();
        $muk2 = Mukim::all();
        $kampung = Kampung::all();
        $kam2 = Kampung::all();

        $stesen = Negeri::join('daerahs', 'negeris.id', 'daerahs.U_Negeri_ID')
            ->join('mukims', 'daerahs.id', 'mukims.U_Daerah_ID')
            ->join('kampungs', 'mukims.id', 'kampungs.U_Mukim_ID')
            ->join('stesens', 'kampungs.id', 'stesens.U_Kampung_ID')
            ->get();
        // dd($stesen);
        $bil_Stesen = Stesen::orderBy('id', 'desc')->first();
        if ($bil_Stesen != null) {
            $bil = $bil_Stesen->Stesen_kod;
        } else {
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('utiliti.lokasi.stesen.index', [
            'negeri' => $negeri,
            'neg2' => $neg2,
            'daerah' => $daerah,
            'dae2' => $dae2,
            'mukim' => $mukim,
            'muk2' => $muk2,
            'kampung' => $kampung,
            'kam2' => $kam2,
            'stesen' => $stesen,
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
        AuditTrailController::audit('utiliti', 'stesen', 'cipta');
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
        AuditTrailController::audit('utiliti', 'stesen', 'kemaskini');
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
        try {
            $stesen->delete();
        } catch (\Throwable $th) {
            alert()->error('Maklumat berkait dengan rekod di bahagian lain, sila hapuskan rekod di bahagian tersebut dahulu.', 'Tidak Berjaya')->persistent('Tutup');
            return back();
        }
        AuditTrailController::audit('utiliti', 'stesen', 'hapus');
        alert()->success('Maklumat telah dihapuskan', 'Berjaya');
        return redirect('/utiliti/lokasi/stesen');
    }

    public function filter($data)
    {
        $data = explode('_', $data);
        $negeri = $data[0]; $daerah = $data[1]; $mukim = $data[2]; $kampung = $data[3];

        if ($negeri != null) {
            // ADA NEGERI
            if ($daerah != null) {
                //ADA DAERAH
                if ($mukim != null) {
                    //ADA MUKIM
                    if ($kampung != null) {
                        //ADA KAMPUNG
                        $stesen = Stesen::where('U_Negeri_ID', $negeri)->where('U_Daerah_ID', $daerah)->where('U_Mukim_ID', $mukim)->where('U_Kampung_ID', $kampung)->get(); //ABCD

                    } else {
                        //TIADA KAMPUNG
                        $stesen = Stesen::where('U_Negeri_ID', $negeri)->where('U_Daerah_ID', $daerah)->where('U_Mukim_ID', $mukim)->get(); //ABC

                    }
                    
                } else {
                    //TIADA MUKIM
                    if ($kampung != null) {
                        //ADA KAMPUNG
                        $stesen = Stesen::where('U_Negeri_ID', $negeri)->where('U_Daerah_ID', $daerah)->where('U_Kampung_ID', $kampung)->get(); //ABD

                    } else {
                        // TIADA KAMPUNG
                        $stesen = Stesen::where('U_Negeri_ID', $negeri)->where('U_Daerah_ID', $daerah)->get(); //AB

                    }

                }
                
            } else {
                //TIADA DAERAH
                if ($mukim != null) {
                    //ADA MUKIM
                    if ($kampung != null) {
                        //ADA KAMPUNG
                        $stesen = Stesen::where('U_Negeri_ID', $negeri)->where('U_Mukim_ID', $mukim)->where('U_Kampung_ID', $kampung)->get(); //ACD

                    } else {
                        //TIADA KAMPUNG
                        $stesen = Stesen::where('U_Negeri_ID', $negeri)->where('U_Mukim_ID', $mukim)->get(); //AC

                    }
                    
                } else {
                    //TIADA MUKIM
                    if ($kampung != null) {
                        //ADA KAMPUNG
                        $stesen = Stesen::where('U_Negeri_ID', $negeri)->where('U_Kampung_ID', $kampung)->get(); //AD

                    } else {
                        //TIADA KAMPUNG
                        $stesen = Stesen::where('U_Negeri_ID', $negeri)->get(); //A

                    }

                }

            }
            
        } else {
            //TIADA NEGERI
            if ($daerah != null) {
                //ADA DAERAH
                if ($mukim != null) {
                    //ADA MUKIM
                    if ($kampung != null) {
                        //ADA KAMPUNG
                        $stesen = Stesen::where('U_Daerah_ID', $daerah)->where('U_Mukim_ID', $mukim)->where('U_Kampung_ID', $kampung)->get(); //BCD

                    } else {
                        //TIADA KAMPUNG
                        $stesen = Stesen::where('U_Daerah_ID', $daerah)->where('U_Mukim_ID', $mukim)->get(); //BC

                    }
                    
                } else {
                    //TIADA MUKIM
                    if ($kampung != null) {
                        //ADA KAMPUNG
                        $stesen = Stesen::where('U_Daerah_ID', $daerah)->where('U_Kampung_ID', $kampung)->get(); //BD

                    } else {
                        //TIADA KAMPUNG
                        $stesen = Stesen::where('U_Daerah_ID', $daerah)->get(); //B

                    }

                }
                
            } else {
                //TIADA DAERAH
                if ($mukim != null) {
                    //ADA MUKIM
                    if ($kampung != null) {
                        //ADA KAMPUNG
                        $stesen = Stesen::where('U_Mukim_ID', $mukim)->where('U_Kampung_ID', $kampung)->get(); //CD

                    } else {
                        //TIADA KAMPUNG
                        $stesen = Stesen::where('U_Mukim_ID', $mukim)->get(); //C

                    }
                    
                } else {
                    //TIADA MUKIM
                    if ($kampung != null) {
                        //ADA KAMPUNG
                        $stesen = Stesen::where('U_Kampung_ID', $kampung)->get(); //D

                    } else {
                        //TIADA KAMPUNG
                        $stesen = Stesen::all(); //SEMUA

                    }

                }

            }

        }
        
        return response()->json($stesen);
    }
}
