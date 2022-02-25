<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKehadiranRequest;
use App\Http\Requests\UpdateKehadiranRequest;
use App\Models\Aturcara;
use App\Models\JadualKursus;
use App\Models\Kehadiran;
use App\Models\KodKursus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KehadiranController extends Controller
{

    public function indexULS($kod_kursus)
    {
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

        $kod_kursuss = JadualKursus::where('id', $kod_kursus)->firstorFail();
        $kehadiran = Aturcara::where('ac_jadual_kursus', $kod_kursus)
            ->orderBy('ac_hari', 'ASC')
            ->orderBy('ac_sesi', 'ASC')
            ->get();



        $hari = ['Pertama', 'Kedua', 'Ketiga', 'Keempat', 'Kelima', 'Keenam'];

        $date = displayDates($kod_kursuss->tarikh_mula, $kod_kursuss->tarikh_tamat);
        // dd($kehadiran);
        return view('uls.peserta.permohonan.kehadiran', [
            'kod_kursus' => $kod_kursuss,
            'kehadiran' => $kehadiran,
            'hari' => $hari,
            'date' => $date,
            'id_jadual' => $kod_kursus,
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
    public function fromUlsQR(Kehadiran $kehadiran)
    {
        $kod_kursus = KodKursus::where('kod_Kursus', $kehadiran->kod_kursus)->firstorFail();
        $calonasal = User::where('jenis_pengguna', 'Peserta ULS')->get();
        return view('uls.peserta.permohonan.kehadiranQR', [
            'kehadiran' => $kehadiran,
            'kod_kursus' => $kod_kursus,
            'calonAsal' => $calonasal,
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

    public function storeQR(Request $request, Kehadiran $kehadiran)
    {
        if ($request->status == "CALON ASAL") {
            $kehadiran->update([
                'tarikh_imbasQR' => now()->toDateString(),
                'masa_imbasQR' => now()->toTimeString(),
            ]);
        } elseif ($request->status == "PENGGANTI") {
            $kehadiran->update([
                'tarikh_imbasQR' => now()->toDateString(),
                'masa_imbasQR' => now()->toTimeString(),
                'nama_pengganti' => $request->nama_peserta,
                'noKP_pengganti' => $request->no_kp_peserta,
            ]);
        }
        return back();
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
        dd($kehadiran->status_kehadiran);
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
    public function admin_rekod_kehadiran_peserta_UsUls(KodKursus $kod_kursus)
    {

        $kehadiran = Kehadiran::all();

        $pesertaUls = User::where('jenis_pengguna', 'Peserta ULS')->get();

        $hari = ['Pertama', 'Kedua', 'Ketiga', 'Keempat', 'Kelima', 'Keenam', 'Ketujuh', 'Kelapan', 'Kesembilan', 'Kesepuluh'];

        return view('uls.urus_setia.kehadiran.kehadiran-ke-kursus.rekod-kehadiran-peserta', [
            'kod_kursus' => $kod_kursus,
            'hari' => $hari,
            'kehadiran' => $kehadiran,
            'pesertaUls' => $pesertaUls,
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

    // Pengesahan
    public function admin_mengesahkan_kehadiran_peserta_UsUls(KodKursus $kod_kursus)
    {
        $kehadiran = Kehadiran::all();

        $pesertaUls = User::where('jenis_pengguna', 'Peserta ULS')->get();

        $hari = ['Pertama', 'Kedua', 'Ketiga', 'Keempat', 'Kelima', 'Keenam', 'Ketujuh', 'Kelapan', 'Kesembilan', 'Kesepuluh'];

        return view('uls.urus_setia.kehadiran.kehadiran-ke-kursus.rekod-pengesahan-peserta', [
            'kod_kursus' => $kod_kursus,
            'hari' => $hari,
            'kehadiran' => $kehadiran,
            'pesertaUls' => $pesertaUls,
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
}
