<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeruntukanPesertaRequest;
use App\Http\Requests\UpdatePeruntukanPesertaRequest;
use App\Models\JadualKursus;
use App\Models\PeruntukanPeserta;
use App\Models\Negeri;
use App\Models\Agensi;
use App\Models\PusatTanggungjawab;
use App\Mail\PanggilanKeKursus;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;


class PeruntukanPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePeruntukanPesertaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeruntukanPesertaRequest $request)
    {
        $peruntukanPeserta = new PeruntukanPeserta($request->all());
        $peruntukanPeserta->save();

        // foreach($peruntukanPeserta as $peruntukanPeserta){

            $ptj=PusatTanggungjawab::where('id',$peruntukanPeserta->pp_pusat_tanggungjawab)->get()->first();
            // $receiver=$ptj->email;
            $jadual=JadualKursus::where('id',$peruntukanPeserta->pp_jadual_kursus)->with(['tempat'])->first();
            $agensi = Agensi::with(['negeri']);

        // }


        // dd($receiver);
        // dd($ptj,$jadual);

        alert()->success('Maklumat telah disimpan', 'Berjaya Disimpan');



        $pdf = Pdf::loadView('pdf.surat-panggilan-kursus',[

            'jadual'=>$jadual,
            'agensi'=>$agensi,
            'peruntukanPeserta'=>$peruntukanPeserta,
            'hari_ini' => date("d m Y")
        ]);



        $peruntukanpeserta=PeruntukanPeserta::where('pp_jadual_kursus',$jadual->id)->get();

        $data_email = [
            'nama_pt' => $ptj->nama_PT,
            'peruntukan_peserta'=>$peruntukanPeserta->pp_peruntukan_calon,
            'nama_kursus' => $jadual->kursus_nama,
            'tarikh' => $jadual->tarikh_mula,
        ];

        $receiver = "nurul.ain@pipeline.com.my";

        Mail::send('emails.panggilan-ke-kursus', $data_email, function ($message) use ($receiver, $pdf) {
            $message->to($receiver)
                ->subject("Surat Panggilan Ke Kursus")
                ->attachData($pdf->output(), 'Surat Panggilan Ke Kursus.pdf');
        });



        // Mail::to($receiver)->send(new PanggilanKeKursus());

        // Mail::send('emails.panggilan-ke-kursus', function ($message) use ($receiver, $pdf) {
        //     $message->to($receiver)
        //         ->attachData($pdf->output(), 'Surat_Panggilan.pdf');
        // });

        return redirect('/pengurusan_kursus/peruntukan_peserta/'.$request->pp_jadual_kursus);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PeruntukanPeserta  $peruntukanPeserta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadualKursus = JadualKursus::where('id', $id)->firstorFail();
        $negeri = Negeri::all();
        $pusat_tanggungjawab = PusatTanggungjawab::all();
        $peruntukan_peserta = PeruntukanPeserta::where('pp_jadual_kursus', $jadualKursus->id)->get();
        $total_calon = PeruntukanPeserta::where('pp_jadual_kursus', $jadualKursus->id)->sum('pp_peruntukan_calon');

        return view('pengurusan_kursus.semak_jadual.peruntukan_peserta',[
            'jadualKursus'=>$jadualKursus,
            'negeri'=>$negeri,
            'pusat_tanggungjawab'=>$pusat_tanggungjawab,
            'peruntukan_peserta'=>$peruntukan_peserta,
            'total_calon'=>$total_calon
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeruntukanPeserta  $peruntukanPeserta
     * @return \Illuminate\Http\Response
     */
    public function edit(PeruntukanPeserta $peruntukanPeserta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeruntukanPesertaRequest  $request
     * @param  \App\Models\PeruntukanPeserta  $peruntukanPeserta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeruntukanPesertaRequest $request, PeruntukanPeserta $peruntukanPeserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeruntukanPeserta  $peruntukanPeserta
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $peruntukanPeserta = PeruntukanPeserta::find($id);
        $peruntukanPeserta->delete();
        alert()->success('Maklumat telah dihapuskan', 'Berjaya');

        return back();
    }
}
