<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBidangKursusRequest;
use App\Http\Requests\UpdateBidangKursusRequest;
use App\Models\AuditTrail;
use App\Models\BidangKursus;
use Illuminate\Support\Facades\Auth;

class BidangKursusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $bidangKursus = BidangKursus::all();

        $bidang_staf = BidangKursus::orderBy('id', 'desc')->where('UL_Bidang_Kursus', 'Staf')->first();
        if ($bidang_staf != null) {
            $bil_staf = $bidang_staf->kod_Bidang_Kursus;
        }else{
            $bil_staf = 0;
        }
        $bil_staf = $bil_staf + 1;
        $bil_staf = sprintf("%02d", $bil_staf);

        $bidang_pk = BidangKursus::orderBy('id', 'desc')->where('UL_Bidang_Kursus', 'Pekebun Kecil')->first();
        if ($bidang_pk != null) {
            $bil_pk = $bidang_pk->kod_Bidang_Kursus;
        }else{
            $bil_pk = 0;
        }
        $bil_pk = $bil_pk + 1;
        $bil_pk = sprintf("%02d", $bil_pk);

        return view('utiliti.kursus.bidang.index', [
            'bidangKursus' => $bidangKursus,
            'bil_staf' => $bil_staf,
            'bil_pk' => $bil_pk
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
     * @param  \App\Http\Requests\StoreBidangKursusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBidangKursusRequest $request)
    {
        $bidangKursus = new BidangKursus;
        $bidangKursus->UL_Bidang_Kursus = $request->UL_Bidang_Kursus;
        $bidangKursus->kod_Bidang_Kursus = $request->kod_Bidang_Kursus;
        $bidangKursus->nama_Bidang_Kursus = $request->nama_Bidang_Kursus;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $bidangKursus->status_Bidang_Kursus = $status;

        $bidangKursus->save();

        $audit = new AuditTrail;
        $audit->butiran = "Bidang Kursus ditambah: ".$request->nama_Bidang_Kursus;
        $audit->id_pengguna = Auth::id();
        $audit->save();

        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/utiliti/kursus/bidang_kursus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BidangKursus  $bidangKursus
     * @return \Illuminate\Http\Response
     */
    public function show(BidangKursus $bidangKursus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BidangKursus  $bidangKursus
     * @return \Illuminate\Http\Response
     */
    public function edit(BidangKursus $bidangKursus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBidangKursusRequest  $request
     * @param  \App\Models\BidangKursus  $bidangKursus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBidangKursusRequest $request, $id)
    {
        $bidangKursus = BidangKursus::find($id);
        $bidangKursus->UL_Bidang_Kursus = $request->UL_Bidang_Kursus;
        $bidangKursus->kod_Bidang_Kursus = $request->kod_Bidang_Kursus;
        $bidangKursus->nama_Bidang_Kursus = $request->nama_Bidang_Kursus;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $bidangKursus->status_Bidang_Kursus = $status;

        $bidangKursus->save();
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        return redirect('/utiliti/kursus/bidang_kursus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BidangKursus  $bidangKursus
     * @return \Illuminate\Http\Response
     */
    public function destroy($bidangKursus)
    {
        $bidangKursus = BidangKursus::find($bidangKursus);
        
        try {
            $bidangKursus->delete();
        } catch (\Throwable $th) {
            alert()->error('Maklumat ini berkait dengan rekod di bahagian lain, sila hapuskan rekod di bahagian tersebut dahulu.', 'Tidak Berjaya')->persistent('Tutup');
            return back();
        }

        alert()->success('Berjaya dihapus','Hapus');
        return redirect('/utiliti/kursus/bidang_kursus');
    }
}
