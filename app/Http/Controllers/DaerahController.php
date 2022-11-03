<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDaerahRequest;
use App\Http\Requests\UpdateDaerahRequest;
use App\Models\Daerah;
use App\Models\Negeri;

class DaerahController extends Controller
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
        $daerah = Daerah::with('negeri')->get();
        $negeri = Negeri::all();
        // $neg2 = Negeri::all();
        // foreach($daerah as $d){
        //     echo "<br>".$d->negeri->Negeri;
        // }
        // exit();
        return view('utiliti.lokasi.daerah.index', [
            'negeri' => $negeri,
            // 'neg2' => $neg2,
            'daerah' => $daerah,
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
     * @param  \App\Http\Requests\StoreDaerahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDaerahRequest $request)
    {

        $daerah = new Daerah;
        // $daerah = Daerah::find($daerah);
        $daerah->U_Negeri_ID = $request->U_Negeri_ID;
        $daerah->Kod_Daerah = $request->Kod_Daerah;
        $daerah->Daerah = $request->Daerah;
        $daerah->U_Daerah_ID = $daerah->U_Negeri_ID. $daerah->Kod_Daerah;

        $daerah->Daerah = $request->Daerah;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $daerah->status_daerah = $status;
        $daerah->save();

        alert()->success('Maklumat telah dicipta', 'Berjaya');
        AuditTrailController::audit('utiliti', 'daerah', 'cipta', $daerah->Daerah);
        return redirect('/utiliti/lokasi/daerah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Daerah  $daerah
     * @return \Illuminate\Http\Response
     */
    public function show(Daerah $daerah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Daerah  $daerah
     * @return \Illuminate\Http\Response
     */
    public function edit(Daerah $daerah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDaerahRequest  $request
     * @param  \App\Models\Daerah  $daerah
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDaerahRequest $request, $daerah)
    {
        $daerah = Daerah::find($daerah);
        $daerah->U_Negeri_ID = $request->U_Negeri_ID;
        $daerah->Kod_Daerah = $request->Kod_Daerah;
        $daerah->Daerah = $request->Daerah;
        $daerah->U_Daerah_ID = $daerah->U_Negeri_ID. $daerah->U_Daerah_ID;


        // $daerah->Daerah_Rkod = $request->Daerah_Rkod;

        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $daerah->status_daerah = $status;

        $daerah->save();
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        AuditTrailController::audit('utiliti', 'daerah', 'kemaskini', $daerah->Daerah);
        return redirect('/utiliti/lokasi/daerah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Daerah  $daerah
     * @return \Illuminate\Http\Response
     */
    public function destroy($daerah)
    {
        $daerah = Daerah::find($daerah);
        $nama = $daerah->Daerah;
        try {
            $daerah->delete();
        } catch (\Throwable $th) {
            alert()->error('Maklumat berkait dengan rekod di bahagian lain, sila hapuskan rekod di bahagian tersebut dahulu.', 'Tidak Berjaya')->persistent('Tutup');
            return back();
        }

        alert()->success('Maklumat telah dihapus', 'Berjaya');
        AuditTrailController::audit('utiliti', 'daerah', 'hapus', $nama);
        return redirect('/utiliti/lokasi/daerah');
    }

    public function filter($search)
    {
        $daerah = Daerah::where('U_Negeri_ID', $search)->get();
        return response()->json($daerah);
    }
}
