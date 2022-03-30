<?php

namespace App\Http\Controllers;

use App\Models\Aturcara;
use App\Models\JadualKursus;
use App\Models\Kehadiran;
use App\Models\KodKursus;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CetakKodQRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kod_kursus = JadualKursus::all();

        if (Route::getCurrentRoute()->getPrefix() == "us-uls/kehadiran") {
            return view('uls.urus_setia.kehadiran.cetakkodqr.index', ['kod_kursus' => $kod_kursus]);
        } elseif (Route::getCurrentRoute()->getPrefix() == "us-ulpk/kehadiran") {
            return view('ulpk.urus_setia.kehadiran.cetakkodqr.index', ['kod_kursus' => $kod_kursus]);
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KodKursus  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function show($kod_kursus)
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

        $k = JadualKursus::where('id', $kod_kursus)->firstorFail();
        $kehadiran = Aturcara::where('ac_jadual_kursus', $k->id)
            ->orderBy('ac_hari', 'ASC')->get();
        $hari = ['Pertama', 'Kedua', 'Ketiga', 'Keempat', 'Kelima', 'Keenam'];
        $date = displayDates($k->tarikh_mula, $k->tarikh_tamat);

        $temp = 0;
        $tarikh_latest = 0;

        if (Route::getCurrentRoute()->getPrefix() == "us-uls/kehadiran") {
            return view('uls.urus_setia.kehadiran.cetakkodqr.show', [
                'kod_kursus' => $k,
                'kehadiran' => $kehadiran,
                'hari' => $hari,
                'date'=>$date,
                'temp'=>$temp
            ]);
        } elseif (Route::getCurrentRoute()->getPrefix() == "us-ulpk/kehadiran") {
            return view('ulpk.urus_setia.kehadiran.cetakkodqr.show', ['kod_kursus' => $k]);
        }

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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kehadiran $kehadiran)
    {
        //
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

    public function printQR($id)
    {

        $pdf = Pdf::loadView('uls.urus_setia.kehadiran.cetakkodqr.printQR', ['id' => $id]);

        return view('uls.urus_setia.kehadiran.cetakkodqr.printQR', ['id' => $id]);
        // return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));

    }
}
