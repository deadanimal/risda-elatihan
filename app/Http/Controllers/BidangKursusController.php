<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBidangKursusRequest;
use App\Http\Requests\UpdateBidangKursusRequest;
use App\Models\BidangKursus;

class BidangKursusController extends Controller
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
        $bidangKursus = BidangKursus::all();
        $bil_bk = BidangKursus::orderBy('id', 'desc')->first();
        if ($bil_bk != null) {
            $bil = $bil_bk->kod_Bidang_Kursus;
        }else{
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('utiliti.kursus.bidang.index', [
            'bidangKursus' => $bidangKursus,
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
    public function update(UpdateBidangKursusRequest $request, BidangKursus $bidangKursus)
    {
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
        return redirect('/utiliti/kursus/bidang_kursus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BidangKursus  $bidangKursus
     * @return \Illuminate\Http\Response
     */
    public function destroy(BidangKursus $bidangKursus)
    {
        $bidangKursus->delete();
        return redirect('/utiliti/kursus/bidang_kursus');
    }
}
