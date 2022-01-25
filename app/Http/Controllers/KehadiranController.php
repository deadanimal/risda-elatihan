<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKehadiranRequest;
use App\Http\Requests\UpdateKehadiranRequest;
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

        $kod_kursuss = KodKursus::where('kod_Kursus', $kod_kursus)->firstorFail();
        $kehadiran = Kehadiran::where('kod_kursus', $kod_kursus)->where('no_pekerja', Auth::user()->id)
            ->orderBy('tarikh', 'ASC')->get();

        $hari = ['Pertama', 'Kedua', 'Ketiga', 'Keempat', 'Kelima', 'Keenam'];

        $date = displayDates($kod_kursuss->jadualkursus->tarikh_mula, $kod_kursuss->jadualkursus->tarikh_tamat);

        return view('uls.peserta.permohonan.kehadiran', [
            'kod_kursus' => $kod_kursuss,
            'kehadiran' => $kehadiran,
            'hari' => $hari,
            'date' => $date,
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
        $kehadiran = Kehadiran::where('id', $request->id_kehadiran)->firstorFail();
        $kehadiran->update($request->all());
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
    public function admin_kehadiran_peserta_UsUls()
    {
        return view('uls.urus_setia.kehadiran.kehadiran-ke-kursus.merekod-kehadiran');
    }
    public function admin_rekod_kehadiran_peserta_UsUls()
    {
        return view('uls.urus_setia.kehadiran.kehadiran-ke-kursus.rekod-kehadiran-peserta');
    }
    public function admin_mengesahkan_peserta_UsUls()
    {
        return view('uls.urus_setia.kehadiran.kehadiran-ke-kursus.mengesahkan-kehadiran');
    }
    public function admin_mengesahkan_kehadiran_peserta_UsUls()
    {
        return view('uls.urus_setia.kehadiran.kehadiran-ke-kursus.rekod-pengesahan-peserta');
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
