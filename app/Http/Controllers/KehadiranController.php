<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKehadiranRequest;
use App\Http\Requests\UpdateKehadiranRequest;
use App\Models\Aturcara;
use App\Models\JadualKursus;
use App\Models\Kehadiran;
use App\Models\KodKursus;
use App\Models\Permohonan;
use App\Models\User;
use App\Models\Agensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

class KehadiranController extends Controller
{

    public function rekod()
    {
        return view('uls.urus_setia.kehadiran.kehadiran-ke-kursus.merekod-kehadiran', [
            'jadual_kursus' => JadualKursus::all(),
        ]);
    }

    public function indexULS($id)
    {
        $permohonan = Permohonan::find($id);
        function displayDates($date1, $date2, $format = 'Y-m-d')
        {
            $dates = array();
            $current = strtotime($date1);
            $date2 = strtotime($date2);
            $stepVal = '+1 day';
            while ($current <= $date2) {
                $dates[] = date($format, $current);
                $current = strtotime($stepVal, $current);
            }
            return $dates;
        }

        $kod_kursuss = JadualKursus::where('id', $permohonan->kod_kursus)->firstorFail();
        $aturcara = Aturcara::with(['jadual'])->where('ac_jadual_kursus', $permohonan->kod_kursus)
            ->orderBy('ac_hari', 'ASC')
            ->orderBy('ac_sesi', 'ASC')
            ->get();

        foreach ($aturcara as $key => $ac) {
            $kehadiran = Kehadiran::where('kod_kursus', $kod_kursuss->kursus_kod_nama_kursus)
            ->where('no_pekerja', $permohonan->no_pekerja)
            ->where('jadual_kursus_ref', $ac->id)
            ->first();

            if ($kehadiran == null) {
                $ac['status_kehadiran'] = null;
            }else {
                $ac['status_kehadiran'] = $kehadiran;
            }

            if ($kehadiran['status_kehadiran_ke_kursus'] == null) {
                $ac['status_ke_kursus'] = null;
            } else {
                $ac['status_ke_kursus'] = $kehadiran;
            }
        }

        $hari = ['Pertama', 'Kedua', 'Ketiga', 'Keempat', 'Kelima', 'Keenam'];

        $date = displayDates($kod_kursuss->tarikh_mula, $kod_kursuss->tarikh_tamat);
        
        return view('uls.peserta.permohonan.kehadiran', [
            'kod_kursus' => $kod_kursuss,
            'kehadiran' => $kehadiran,
            'hari' => $hari,
            'date' => $date,
            'id_jadual' => $permohonan->kod_kursus,
            'aturcara'=>$aturcara,
        ]);
    }
    public function indexULPK($kod_kursus)
    {
        $kod_kursus = KodKursus::where('kod_Kursus', $kod_kursus)->firstorFail();
        return view('ulpk.peserta.permohonan.kehadiran', [
            'kod_kursus' => $kod_kursus,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fromUlsQR($id)
    {
        function tarikh($date1, $date2, $format = 'Y-m-d')
        {
            $dates = array();
            $current = strtotime($date1);
            $date2 = strtotime($date2);
            $stepVal = '+1 day';
            while ($current <= $date2) {
                $dates[] = date($format, $current);
                $current = strtotime($stepVal, $current);
            }
            return $dates;
        }

        $aturcara = Aturcara::with('jadual')->find($id);
        dd($aturcara);
        $jadual = JadualKursus::with('pemohon')->where('id', $aturcara->ac_jadual_kursus)->first();
        $date = tarikh($jadual->tarikh_mula, $jadual->tarikh_tamat);
        $permohonan = Permohonan::with('peserta')->where('kod_kursus', $aturcara->ac_jadual_kursus)->get();
        $calonasal = User::where('jenis_pengguna', 'Peserta ULS')->get();
        return view('uls.peserta.permohonan.kehadiranQR', [
            'aturcara' => $aturcara,
            'jadual' => $jadual,
            'calonAsal' => $calonasal,
            'tarikh' => $date,
            'permohonan' => $permohonan
        ]);
    }
    public function fromUlpkQR()
    {
        return view('uls.peserta.permohonan.kehadiranQR');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKehadiranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->jenis_input == '1') {
            $kehadiran = Kehadiran::find($request->id_keh);
            if ($kehadiran == null) {
                alert()->error('Sila isi maklumat status kehadiran sebelum ke kursus.', 'Gagal');
                return back();
            }
            $kehadiran->status_kehadiran_ke_kursus = $request->status_kehadiran_ke_kursus;
            $kehadiran->alasan_ketidakhadiran_ke_kursus = $request->alasan_ketidakhadiran_ke_kursus;
            $kehadiran->save();
        } else {
            $kehadiran = new Kehadiran($request->all());
            $kehadiran->save();
        }

        return back();
    }

    public function storeQR(Request $request, $id)
    {
        $check = Kehadiran::where('jadual_kursus_id', $request->jadual_kursus_id)->where('jadual_kursus_ref', $id)->where('no_pekerja', $request->nama_peserta)->first();
        if ($check != null) {
            if ($check->tarikh_imbasQR != null) {
                alert()->error('PESERTA TELAH MENGEMASKINI KEHADIRAN. ANDA TIDAK DIBENARKAN MENGEMASKINI KEHADIRAN LEBIH DARI SATU KALI', 'GAGAL');
                return back();
            }
        }

        $kehadiran = Kehadiran::where('kod_kursus', $request->jadual_kursus)->where('jadual_kursus_ref', $id)->first();
        // dd($kehadiran);
        if ($kehadiran == null) {
            $kehadiran = new Kehadiran;
        }

        if ($request->status == "PENGGANTI") {
            $kehadiran->no_pekerja = $request->nama_diganti;
            $kehadiran->nama_pengganti = $request->nama_peserta;
        }else{
            $kehadiran->no_pekerja = $request->nama_peserta;
        }
        $kehadiran->kod_kursus = $request->jadual_kursus;
        $kehadiran->tarikh_imbasQR = now()->toDateString();
        $kehadiran->masa_imbasQR = now()->toTimeString();
        $kehadiran->tarikh = $request->tarikh_kehadiran;
        $kehadiran->sesi = $request->sesi;
        $kehadiran->jadual_kursus_id = $request->jadual_kursus_id;
        $kehadiran->jadual_kursus_ref = $id;
        $kehadiran->status_kehadiran_ke_kursus = 'HADIR';

        $kehadiran->save();
        alert()->success('Maklumat telah direkodkan', 'Berjaya');
        return redirect('/');


        // if ($request->status == "CALON ASAL") {
        //     $kehadiran->update([
        //         'tarikh_imbasQR' => now()->toDateString(),
        //         'masa_imbasQR' => now()->toTimeString(),
        //     ]);
        // } elseif ($request->status == "PENGGANTI") {
        //     $kehadiran->update([
        //         'tarikh_imbasQR' => now()->toDateString(),
        //         'masa_imbasQR' => now()->toTimeString(),
        //         'nama_pengganti' => $request->nama_peserta,
        //         'noKP_pengganti' => $request->no_kp_peserta,
        //     ]);
        // }
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function show(Kehadiran $kehadiran)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function edit(Kehadiran $kehadiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKehadiranRequest  $request
     * @param  \App\Models\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKehadiranRequest $request, Kehadiran $kehadiran)
    {
        // dd($kehadiran->status_kehadiran);
        $kehadiran->update(['status_kehadiran' => $request->status_kehadiran]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kehadiran $kehadiran)
    {
        //
    }

    // Urus Setia Uls
    // Kehadiran
    public function admin_rekod_kehadiran_peserta_UsUls($jadual_kursus)
    {
        $jadual = JadualKursus::find($jadual_kursus);

        $list_peserta = Kehadiran::with(['aturcara', 'staff', 'pengganti'])->where('jadual_kursus_id', $jadual_kursus)->get();

        $kehadiran = Kehadiran::with(['staff', 'pengganti'])->get();

        $pesertaUls = User::where('jenis_pengguna', 'Peserta ULS')->get();

        $hari = ['Pertama', 'Kedua', 'Ketiga', 'Keempat', 'Kelima', 'Keenam', 'Ketujuh', 'Kelapan', 'Kesembilan', 'Kesepuluh'];

        $temp = 0;
        foreach ($jadual->aturcara as $h) {
            if ($temp != $h->ac_hari) {
                $h['hari'] = $hari[$h->ac_hari - 1];
            }
            $temp = $h->ac_hari;
        }

        return view('uls.urus_setia.kehadiran.kehadiran-ke-kursus.rekod-kehadiran-peserta', [
            'jadualkursus' => $jadual,
            'aturcara' => $jadual->aturcara,
            'kehadiran' => $kehadiran,
            'pesertaUls' => $pesertaUls,
            'list'=>$list_peserta
        ]);
    }

    public function update_kehadiran_peserta_UsUls(Request $request, Kehadiran $kehadiran)
    {
        if ($request->status_staff == "Calon Asal") {
            $kehadiran->update([
                'status_kehadiran_ke_kursus' => $request->status_kehadiran,
            ]);
        } elseif ($request->status_staff == "Pengganti") {
            $kehadiran->update([
                'status_kehadiran_ke_kursus' => $request->status_kehadiran,
                'nama_pengganti' => $request->nama_pengganti,
                'noKP_pengganti' => $request->kad_pengenalan_pengganti,
            ]);
        }
        return back();
    }
    public function update_kehadiran_peserta_UsUls2(Request $request, Kehadiran $kehadiran)
    {
        if ($request->jenis_kehadiran == "1") {
            $kehadiran->update([
                'alasan_ketidakhadiran' => $request->alasan,
            ]);
        } elseif ($request->jenis_kehadiran == "2") {
            $kehadiran->update([
                'alasan_ketidakhadiran_ke_kursus' => $request->alasan,
            ]);
        }
        return back();
    }

    public function displayDates($date1, $date2, $format = 'Y-m-d')
    {
        $dates = array();
        $current = strtotime($date1);
        $date2 = strtotime($date2);
        $stepVal = '+1 day';
        while ($current <= $date2) {
            $dates[] = date($format, $current);
            $current = strtotime($stepVal, $current);
        }
        return $dates;
    }

    // Pengesahan
    public function admin_mengesahkan_kehadiran_peserta_UsUls(JadualKursus $jadual_kursus)
    {
        $date = $this->displayDates($jadual_kursus->tarikh_mula, $jadual_kursus->tarikh_tamat);

        $kehadiran = Kehadiran::all();

        $pesertaUls = User::where('jenis_pengguna', 'Peserta ULS')->get();

        $hari = ['Pertama', 'Kedua', 'Ketiga', 'Keempat', 'Kelima', 'Keenam', 'Ketujuh', 'Kelapan', 'Kesembilan', 'Kesepuluh'];

        $temp = 0;
        foreach ($jadual_kursus->aturcara as $h) {
            if ($temp != $h->ac_hari) {
                $h['hari'] = $hari[$h->ac_hari - 1];
                $h['tarikh'] = $date[$h->ac_hari - 1];
            }
            $temp = $h->ac_hari;
        }

        return view('uls.urus_setia.kehadiran.kehadiran-ke-kursus.rekod-pengesahan-peserta', [
            'jadual_kursus' => $jadual_kursus,
            'kehadiran' => $kehadiran,
            'pesertaUls' => $pesertaUls,
            'aturcara' => $jadual_kursus->aturcara,
        ]);
    }

    public function update_pengesahan_peserta_UsUls(Request $request)
    {
        $kehadiran = array_keys($request->pengesahan);

        foreach ($kehadiran as $k) {
            $kehadi = Kehadiran::find($k);
            $kehadi->update([
                'pengesahan' => "DISAHKAN",
            ]);
        }

        return back();
    }

    // Urus Setia Ulpk
    public function admin_kehadiran_peserta_UsUlpk()
    {
        return view('ulpk.urus_setia.kehadiran.kehadiran-ke-kursus.merekod-kehadiran');
    }
    public function admin_rekod_kehadiran_peserta_UsUlpk()
    {
        return view('ulpk.urus_setia.kehadiran.kehadiran-ke-kursus.rekod-kehadiran-peserta');
    }
    public function admin_mengesahkan_peserta_UsUlpk()
    {
        return view('ulpk.urus_setia.kehadiran.kehadiran-ke-kursus.mengesahkan-kehadiran');
    }
    public function admin_mengesahkan_kehadiran_peserta_UsUlpk()
    {
        return view('ulpk.urus_setia.kehadiran.kehadiran-ke-kursus.rekod-pengesahan-peserta');
    }

    public function cetak_qr_pl($id){

        $agensi = Agensi::find($id);

        $pdf = PDF::loadView('ulpk.urus_setia.kehadiran.kehadiran-pl.qr-pl', [
            'agensi'=>$agensi
        ]);

        return $pdf->download('QRCode Pusat Latihan ' . $agensi->nama_Agensi .'.pdf');
    }

    public function kehadiran_pl($id){

        $agensi = Agensi::find($id);
        // $kursus =JadualKursus::with(['tempat','kehadiran'])->where('kursus_tempat',$agensi->id)->get();
        // $kehadiran=Kehadiran::where('status_kehadiran','HADIR')->orWhere('jadual_kursus_id',$kursus->kehadiran->id)->with('staff')->get();



        // $data_staf = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', 'f9d00dae5c6d6d549c306bae6e88222eb2f84307')
        // ->get('https://www4.risda.gov.my/fire/getallstaff/')
        // ->getBody()
        // ->getContents();

        // $data_staf = json_decode($data_staf, true);

        $kursus = JadualKursus::with(['tempat','kehadiran'])->where('kursus_tempat',$agensi->id)->get();

        $peserta = Kehadiran::with(['staff','kursus', 'pengganti'])->where('status_kehadiran','HADIR')
        ->get();


        // dd($peserta);

        return view('ulpk.urus_setia.kehadiran.kehadiran-pl.1',[
            'peserta'=>$peserta,
            'kursus'=>$kursus,
            'agensi'=>$agensi
            // 'kehadiran'=>$kehadiran
        ]);


    }


    public function cetaksijilkursus($id){

        $permohonan=Permohonan::find($id);
        $jadual=JadualKursus::where('id', $permohonan->kod_kursus)->with(['tempat'])->first();
        $agensi = Agensi::where('id', $jadual->kursus_tempat)->where('kategori_agensi',['penganjur','Penganjur'])->with(['kategori'])->first();



        $pdf = PDF::loadView('pdf.sijil_kursus', [
            'permohonan'=>$permohonan,
            'jadual'=>$jadual,
            'agensi'=>$agensi,
            'hari_ini' => date("d m Y")]);


        return $pdf->stream('Sijil Kursus' . $jadual->kursus_nama .'.pdf');

    }
}
