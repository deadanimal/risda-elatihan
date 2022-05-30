<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuditTrailRequest;
use App\Http\Requests\UpdateAuditTrailRequest;
use App\Models\AuditTrail;
use Illuminate\Support\Facades\Auth;

class AuditTrailController extends Controller
{
    public static function audit($modul, $sub, $perkara)
    {
        $auditTrail = new AuditTrail();
        $auditTrail->id_pengguna = Auth::id();
        $auditTrail->butiran = ucfirst($perkara).' '.$modul.' '.$sub;
        $auditTrail->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('audit_trail.index', [
            'auditTrail' => AuditTrail::with('pengguna')->get(),
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
     * @param  \App\Http\Requests\StoreAuditTrailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($title)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function show(AuditTrail $auditTrail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function edit(AuditTrail $auditTrail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuditTrailRequest  $request
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuditTrailRequest $request, AuditTrail $auditTrail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuditTrail $auditTrail)
    {
        $auditTrail->delete();
        alert()->success('Maklumat telah dihapus', 'Berjaya');
        return redirect('/audit_trail');
    }
}
