<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDunRequest;
use App\Http\Requests\UpdateDunRequest;
use App\Models\Dun;
use App\Models\Parlimen;
use App\Models\Negeri;

class DunController extends Controller
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
        $parlimen = Parlimen::all();
        $par2 = Parlimen::all();

        $dun = Negeri::join('parlimens', 'negeris.id', 'parlimens.U_Negeri_ID')
        ->join('duns', 'parlimens.id', 'duns.U_Parlimen_ID')
        ->get();
        
        $bil_muk = Dun::orderBy('id', 'desc')->first();
        if ($bil_muk != null) {
            $bil = $bil_muk->Dun_kod;
        }else{
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('utiliti.lokasi.dun.index', [
            'negeri' => $negeri,
            'neg2' => $neg2,
            'parlimen' => $parlimen,
            'par2' => $par2,
            'dun' => $dun,
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
     * @param  \App\Http\Requests\StoreDunRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDunRequest $request)
    {
        $dun = new Dun;
        $dun->U_Negeri_ID = $request->U_Negeri_ID;
        $dun->U_Parlimen_ID = $request->U_Parlimen_ID;
        $dun->Dun_kod = $request->Dun_kod;
        $dun->Dun = $request->Dun;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $dun->status_dun = $status;
        $dun->save();
        alert()->success('Maklumat telah dicipta', 'Berjaya');
        AuditTrailController::audit('utiliti', 'dun', 'cipta');
        return redirect('/utiliti/lokasi/dun');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dun  $dun
     * @return \Illuminate\Http\Response
     */
    public function show(Dun $dun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dun  $dun
     * @return \Illuminate\Http\Response
     */
    public function edit(Dun $dun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDunRequest  $request
     * @param  \App\Models\Dun  $dun
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDunRequest $request, Dun $dun)
    {
        // $dun = Dun::find($dun)
        $dun->U_Negeri_ID = $request->U_Negeri_ID;
        $dun->U_Parlimen_ID = $request->U_Parlimen_ID;
        $dun->Dun_kod = $request->Dun_kod;
        $dun->Dun = $request->Dun;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $dun->status_dun = $status;
        $dun->save();
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        AuditTrailController::audit('utiliti', 'dun', 'kemaskini');
        return redirect('/utiliti/lokasi/dun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dun  $dun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dun $dun)
    {
        try {
            $dun->delete();
        } catch (\Throwable $th) {
            alert()->error('Maklumat berkait dengan rekod di bahagian lain, sila hapuskan rekod di bahagian tersebut dahulu.', 'Tidak Berjaya')->persistent('Tutup');
            return back();
        }
        alert()->success('Maklumat telah dihapus', 'Berjaya');
        AuditTrailController::audit('utiliti', 'dun', 'hapus');
        return redirect('/utiliti/lokasi/dun');
    }
}
