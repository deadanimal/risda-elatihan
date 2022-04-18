<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermohonanRequest;
use App\Http\Requests\UpdatePermohonanRequest;
use App\Mail\PermohonanGagal;
use App\Mail\PermohonanLulus;
use App\Models\Agensi;
use App\Models\JadualKursus;
use App\Models\KategoriAgensi;
use App\Models\KategoriKursus;
use App\Models\KodKursus;
use App\Models\NotaRujukan;
use App\Models\Permohonan;
use App\Models\Staf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
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
        $permohonan = Permohonan::with(['jadual', 'kehadiran'])->where('no_pekerja', Auth::id())->get();
        foreach ($permohonan as $key => $p) {
            $p->status_kehadiran = null;
            foreach($p->kehadiran as $pk){
                if ($pk->status_kehadiran == 'HADIR') {
                    $p->status_kehadiran = 'Hadir';
                }
            }
        }
        return view('uls.peserta.permohonan.statuspermohonan', [
            'permohonan' => $permohonan,
            'hari_ini' => date("Y-m-d"),
        ]);
    }
    public function indexULPK()
    {
        $permohonan = Permohonan::with(['jadual', 'kehadiran'])->where('no_pekerja', Auth::id())->get();
        foreach ($permohonan as $key => $p) {
            $p->status_kehadiran = null;
            foreach($p->kehadiran as $pk){
                if ($pk->status_kehadiran == 'HADIR') {
                    $p->status_kehadiran = 'Hadir';
                }
            }
        }
        return view('ulpk.peserta.permohonan.statuspermohonan', [
            'permohonan' => $permohonan,
            'hari_ini' => date("Y-m-d"),
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

    public function katalog_uls()
    {
        $kategori = KategoriKursus::where('UL_Kategori_Kursus','Staf')->get();
        $tajuk = JadualKursus::where('kursus_unit_latihan', 'Staf')->get();
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

    public function katalog_ulpk()
    {
        $kategori = KategoriKursus::where('UL_Kategori_Kursus','Pekebun Kecil')->get();
        $tajuk = JadualKursus::where('kursus_unit_latihan', 'Pekebun Kecil')->get();
        // dd($tajuk);
        $kat_tempat = KategoriAgensi::where('Kategori_Agensi', 'Tempat Kursus')->first()->id;
        $lokasi = Agensi::where('kategori_agensi', $kat_tempat)->get();
        $jadual = JadualKursus::where('kursus_unit_latihan', 'Pekebun Kecil')->get();
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
        // semak permohonan
        $semak_permohonan = Permohonan::where('kod_kursus', $request->kod_kursus)->where('no_pekerja', Auth::id())->first();
        if ($semak_permohonan != null) {
            alert()->error('Anda telah memohon penilaian ini', 'Gagal');
            return back();
        }

        $permohonan = new Permohonan($request->all());
        $permohonan->save();

        $user = auth()->user()->jenis_pengguna;
        if ($user == "Peserta ULS") {
            alert()->success('Permohonan anda telah didaftarkan', 'Berjaya');
            return redirect('/uls/permohonan/katelog-kursus');
        }else {
            alert()->success('Permohonan anda telah didaftarkan', 'Berjaya');
            return redirect('/ulpk/permohonan/katelog-kursus');

        }
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
        $pengendali = Agensi::where('id',$jadual->kursus_pengendali_latihan)->first();
        return view('permohonan_kursus.katalog.show', [
            'jadual' => $jadual,
            'pengendali'=>$pengendali
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

        if ($permohonan->status_permohonan == '4') {
            Mail::to('applicantsppeps01@gmail.com')->send(new PermohonanLulus($permohonan));
        }elseif($permohonan->status_permohonan == '5'){
            Mail::to('applicantsppeps01@gmail.com')->send(new PermohonanGagal($permohonan));
        }
        alert()->success('Status permohonan telah dikemaskini', 'Berjaya');
        return redirect('/permohonan_kursus/semakan_permohonan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permohonan = Permohonan::find($id);
        $permohonan->delete();

        alert()->success('Peserta telah dibuang', 'Berjaya');
        return redirect('/permohonan_kursus/semakan_permohonan');
    }

    public function permohonan($id)
    {
        $jadual = JadualKursus::find($id);

        // semak permohonan
        $semak_permohonan = Permohonan::where('kod_kursus', $id)->where('no_pekerja', Auth::id())->first();
        if ($semak_permohonan != null) {
            $sp = 1;
        }else{
            $sp = 0;
        }

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
                return view('permohonan_kursus.katalog.register.staf', [
                    'jadual' => $jadual,
                    'user' => $user,
                    'staf' => $staf,
                    'profil'=>$profil,
                    'sp'=>$sp
                ]);
            }
        }

        $data_pk = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '1cc11a9fec81dc1f99f353f403d6f5bac620aa8f')
            ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $user->no_KP)
            ->getBody()
            ->getContents();

        $data_pk = json_decode($data_pk, true);
        // check if not pk
        if (!empty($data_pk['message'])) {
            alert()->error('No. Kad Pengenalan tiada dalam pangkalan data e-SPEK');
            return back();
        } else {
            $pk = $data_pk[0];
            $pk['tarikh_lahir'] = substr($pk['No_KP'], 4, 2).'/'.substr($pk['No_KP'], 2, 2).'/'.'19'.substr($pk['No_KP'], 0, 2);
            // dd($pk);
            return view('permohonan_kursus.katalog.register.pekebun_kecil', [
                'user' => $user,
                'pk'=>$pk,
                'jadual' => $jadual,
                'sp'=>$sp
            ]);
        }
    }

    public function nota_rujukan($id)
    {
        return view('ulpk.peserta.permohonan.nota_rujukan',[
            'nota_rujukan' => NotaRujukan::where('nr_jadual_kursus', $id)->get(),
            'id'=>$id
        ]);
    }
}
