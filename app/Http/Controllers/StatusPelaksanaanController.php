<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatusPelaksanaanRequest;
use App\Http\Requests\UpdateStatusPelaksanaanRequest;
use App\Models\StatusPelaksanaan;

class StatusPelaksanaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusPelaksanaan = StatusPelaksanaan::all();
        $bil_sp = StatusPelaksanaan::orderBy('id', 'desc')->first();
        if ($bil_sp != null) {
            $bil = $bil_sp->kod_Status_Pelaksanaan;
        }else{
            $bil = 0;
        }
        $bil = $bil + 1;
        $bil = sprintf("%02d", $bil);
        return view('utiliti.status.status_pelaksanaan.index', [
            'statusPelaksanaan'=>$statusPelaksanaan,
            'bil'=>$bil
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
     * @param  \App\Http\Requests\StoreStatusPelaksanaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatusPelaksanaanRequest $request)
    {
        $statusPelaksanaan = new StatusPelaksanaan;
        $statusPelaksanaan->kod_Status_Pelaksanaan = $request->kod_Status_Pelaksanaan;
        $statusPelaksanaan->Status_Pelaksanaan = $request->Status_Pelaksanaan;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $statusPelaksanaan->status_status_pelaksanaan = $status;

        $statusPelaksanaan->save();
        AuditTrailController::audit('utiliti','status pelaksanaan','cipta', $statusPelaksanaan->Status_Pelaksanaan);
        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/utiliti/status/status_pelaksanaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusPelaksanaan  $statusPelaksanaan
     * @return \Illuminate\Http\Response
     */
    public function show(StatusPelaksanaan $statusPelaksanaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusPelaksanaan  $statusPelaksanaan
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusPelaksanaan $statusPelaksanaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatusPelaksanaanRequest  $request
     * @param  \App\Models\StatusPelaksanaan  $statusPelaksanaan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusPelaksanaanRequest $request, StatusPelaksanaan $statusPelaksanaan)
    {
        $statusPelaksanaan->kod_Status_Pelaksanaan = $request->kod_Status_Pelaksanaan;
        $statusPelaksanaan->Status_Pelaksanaan = $request->Status_Pelaksanaan;
        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $statusPelaksanaan->status_status_pelaksanaan = $status;

        $statusPelaksanaan->save();
        AuditTrailController::audit('utiliti','status pelaksanaan','kemaskini', $statusPelaksanaan->Status_Pelaksanaan);
        alert()->success('Maklumat telah dikemaskini', 'Berjaya');
        return redirect('/utiliti/status/status_pelaksanaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusPelaksanaan  $statusPelaksanaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusPelaksanaan $statusPelaksanaan)
    {
        $nama = $statusPelaksanaan->Status_Pelaksanaan;
        $statusPelaksanaan->delete();
        AuditTrailController::audit('utiliti','status pelaksaan','hapus', $nama);
        alert()->success('Maklumat telah dihapuskan', 'Berjaya');
        return redirect('/utiliti/status/status_pelaksanaan');
    }
}
