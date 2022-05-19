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
        $negeri = Negeri::all();
        $neg2 = Negeri::all();
        $daerah = Negeri::join('daerahs', 'negeris.id', 'daerahs.U_Negeri_ID')
        ->select('*')->get();
        // dd($daerah);
        $bil_dae = Daerah::orderBy('id', 'desc')->first();
        if ($bil_dae != null) {
            $bil = $bil_dae->Daerah_Rkod;
        }else{
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);

        return view('utiliti.lokasi.daerah.index', [
            'negeri' => $negeri,
            'neg2' => $neg2,
            'daerah' => $daerah,
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
     * @param  \App\Http\Requests\StoreDaerahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDaerahRequest $request)
    {

        $daerah = new Daerah;
        $daerah->U_Negeri_ID = $request->U_Negeri_ID;
        $daerah->Daerah_Rkod = $request->Daerah_Rkod;
        $daerah->Daerah = $request->Daerah;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $daerah->status_daerah = $status;
        $daerah->save();
        alert()->success('Maklumat telah dicipta', 'Berjaya');
        AuditTrailController::audit('utiliti', 'daerah', 'cipta');
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
        $daerah->Daerah_Rkod = $request->Daerah_Rkod;
        $daerah->Daerah = $request->Daerah;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $daerah->status_daerah = $status;

        $daerah->save();
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        AuditTrailController::audit('utiliti', 'daerah', 'kemaskini');
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
        $daerah->delete();
        alert()->success('Maklumat telah dihapus', 'Berjaya');
        AuditTrailController::audit('utiliti', 'daerah', 'hapus');
        return redirect('/utiliti/lokasi/daerah');
    }
}
