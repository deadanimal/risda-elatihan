<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermohonanRequest;
use App\Http\Requests\UpdatePermohonanRequest;
use App\Models\Agensi;
use App\Models\JadualKursus;
use App\Models\KategoriAgensi;
use App\Models\KategoriKursus;
use App\Models\KodKursus;
use App\Models\Permohonan;
use App\Models\Staf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class PermohonanController extends Controller
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
    public function indexULS()
    {
        return view('uls.peserta.permohonan.statuspermohonan', [
            'permohonan' => Permohonan::where('no_pekerja', Auth::id())->get(),
            'hari_ini' => date("Y-m-d"),
        ]);
    }
    public function indexULPK()
    {
        return view('ulpk.peserta.permohonan.statuspermohonan', [
            'permohonan' => Permohonan::all(),
        ]);
    }

    public function katelog()
    {
        $route = Route::getCurrentRoute()->getPrefix();

        if ($route == "uls/permohonan") {
            return view('uls.peserta.permohonan.katelog');
        } else {
            return view('uls.peserta.permohonan.katelog');
        }
    }

    public function index()
    {
        $kategori = KategoriKursus::where('UL_Kategori_Kursus','Staf')->get();
        $tajuk = KodKursus::where('UL_Kod_Kursus', 'Staf')->get();
        // dd($tajuk);
        $kat_tempat = KategoriAgensi::where('Kategori_Agensi', 'Tempat Kursus')->first()->id;
        $lokasi = Agensi::where('kategori_agensi', $kat_tempat)->get();
        $jadual = JadualKursus::where('kursus_unit_latihan', 'Staf')->get();
        return view('permohonan_kursus.katalog.index', [
            'jadual' => $jadual,
            'kategori' => $kategori,
            'tajuk' => $tajuk,
            'lokasi'=> $lokasi
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
     * @param  \App\Http\Requests\StorePermohonanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermohonanRequest $request)
    {
        $permohonan = new Permohonan($request->all());
        $permohonan->save();
        alert()->success('Permohonan anda telah didaftarkan', 'Berjaya');
        return redirect('/permohonan_kursus/katalog_kursus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadual = JadualKursus::find($id);
        return view('permohonan_kursus.katalog.show', [
            'jadual' => $jadual,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function edit(Permohonan $permohonan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermohonanRequest  $request
     * @param  \App\Models\Permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermohonanRequest $request, $id)
    {
        $permohonan = Permohonan::find($id);
        $permohonan->status_permohonan = $request->status_permohonan;
        $permohonan->save();
        alert()->success('Status permohonan telah dikemaskini', 'Berjaya');
        return redirect('/permohonan_kursus/semakan_permohonan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permohonan $permohonan)
    {
        //
    }

    public function permohonan($id)
    {
        $jadual = JadualKursus::find($id);

        // check ic user
        $user = Auth::user();
        $data_staf = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', 'f9d00dae5c6d6d549c306bae6e88222eb2f84307')
            ->get('https://www4.risda.gov.my/fire/getallstaff/')
            ->getBody()
            ->getContents();

        $data_staf = json_decode($data_staf, true);
        foreach ($data_staf as $key => $s) {
            if ($s['nokp'] == $user->no_KP) {
                $staf = $s;
                $profil = Staf::where('id_Pengguna', $user->id)->first();
                return view('permohonan_kursus.katalog.register', [
                    'jadual' => $jadual,
                    'user' => $user,
                    'staf' => $staf,
                    'profil'=>$profil
                ]);
            }
        }

        $data_pk = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '1cc11a9fec81dc1f99f353f403d6f5bac620aa8f')
            ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $user)
            ->getBody()
            ->getContents();

        $data_pk = json_decode($data_pk, true);

        // check if not pk
        if (!empty($data_pk['message'])) {
            alert()->error('No. Kad Pengenalan tiada dalam pangkalan data e-SPEK');
            return back();
        } else {
            $user = $data_pk[0];
            return view('permohonan_kursus.katalog.register', [
                'user' => $user,
                'jadual' => $jadual
            ]);
        }
    }
}
