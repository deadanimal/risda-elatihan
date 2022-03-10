<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSemakPermohonanRequest;
use App\Http\Requests\UpdateSemakPermohonanRequest;
use App\Models\JadualKursus;
use App\Models\Permohonan;
use App\Models\SemakPermohonan;
use App\Models\Staf;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class SemakPermohonanController extends Controller
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
        $pemohon = Permohonan::all();
        foreach ($pemohon as $key => $p) {
            $p->gred = null;
            $p->pusat_tanggungjawab = null;
            $data_staf = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', 'f9d00dae5c6d6d549c306bae6e88222eb2f84307')
                ->get('https://www4.risda.gov.my/fire/getallstaff/')
                ->getBody()
                ->getContents();

            $data_staf = json_decode($data_staf, true);
            foreach ($data_staf as $key => $s) {
                if ($s['nokp'] == $p->peserta->no_KP) {
                    $p->gred = $s['Gred'];
                    $p->pusat_tanggungjawab = $s['NamaPT'];
                }
            }
        }

        // dd($pemohon);
        return view('permohonan_kursus.semakan_permohonan.index', [
            'pemohon' => $pemohon
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
     * @param  \App\Http\Requests\StoreSemakPermohonanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSemakPermohonanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SemakPermohonan  $semakPermohonan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peserta = Permohonan::find($id);
        $data_staf = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', 'f9d00dae5c6d6d549c306bae6e88222eb2f84307')
            ->get('https://www4.risda.gov.my/fire/getallstaff/')
            ->getBody()
            ->getContents();

        $data_staf = json_decode($data_staf, true);
        foreach ($data_staf as $key => $s) {
            if ($s['nokp'] == $peserta->peserta->no_KP) {
                $pemohon = $s;
            }
        }
        return view('permohonan_kursus.semakan_permohonan.show', [
            'staf' => $pemohon,
            'user' => $peserta,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SemakPermohonan  $semakPermohonan
     * @return \Illuminate\Http\Response
     */
    public function edit(SemakPermohonan $semakPermohonan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSemakPermohonanRequest  $request
     * @param  \App\Models\SemakPermohonan  $semakPermohonan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSemakPermohonanRequest $request, SemakPermohonan $semakPermohonan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SemakPermohonan  $semakPermohonan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permohonan = Permohonan::find($id);
        $permohonan->delete();
        alert()->success('Maklumat berjaya dihapus', 'Berjaya');
        return redirect('/pengurusan_peserta/semakan_pemohon');
    }
}
