<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKehadiranPusatLatihanRequest;
use App\Http\Requests\UpdateKehadiranPusatLatihanRequest;
use App\Models\KehadiranPusatLatihan;
use App\Models\Agensi;
use App\Models\User;
use App\Models\JadualKursus;
use App\Models\KategoriAgensi;
use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Support\Facades\Auth;


class KehadiranPusatLatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     *
     */

    public function indexPl()
    {
        $kategori_agensi=KategoriAgensi::where('Kategori_Agensi',['Tempat Kursus'])->first();
        $agensi=Agensi::with(['negeri','daerah'])->where('kategori_agensi',$kategori_agensi->id)->get();

        // dd($kursus);

        return view('kehadiran_pl.index-pl',[
            'agensi'=>$agensi,
        ]);

    }

    public function index_kehadiran(KehadiranPusatLatihan $kehadiran_pl,$id)
    {
        $agensi=Agensi::find($id);
        $kehadiran_pl=KehadiranPusatLatihan::with(['peserta','kursus'])->where('agensi_id',$agensi->id)->get();
        // dd($kehadiran_pl);

        return view('kehadiran_pl.1',[

            'agensi'=>$agensi,
            'kehadiran_pl'=>$kehadiran_pl
        ]);



    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $agensi = Agensi::find($id);
        $hari_ini = date('Y-m-d');

        $kursus=JadualKursus::with('tempat')
            ->where('kursus_tempat',$agensi->id)
            // ->where('tarikh_mula','>=',$hari_ini)
            // ->where('tarikh_tamat','<',$hari_ini)
            ->get();



        if ((Auth::user()->jenis_pengguna==="Urus Setia ULS")|| (Auth::user()->jenis_pengguna==="Urus Setia ULPK")) {

            $user=User::all();

            return view('kehadiran_pl.create-urusetia', [
                'kursus'=>$kursus,
                'agensi'=>$agensi,
                'hari_ini'=>$hari_ini,
                'user'=>$user
            ]);
        }
        else{


            return view('kehadiran_pl.create', [
                'kursus'=>$kursus,
                'agensi'=>$agensi,
                'hari_ini'=>$hari_ini
            ]);
        }





    }


    public function tambahkehadiran_pl($id)
    {
        $agensi = Agensi::find($id);
        $hari_ini = date('Y-m-d');

        $kursus=JadualKursus::with('tempat')
        ->where('kursus_tempat',$agensi->id)
        // where('tarikh_mula','=',$hari_ini)
        // ->where('tarikh_tamat','<',$hari_ini)
        ->get();

        // dd($agensi->id);
        return view('kehadiran_pl.create',[
            'kursus'=>$kursus,
            'hari_ini'=>$hari_ini,
            'agensi'=>$agensi
        ]);


    }


    public function store(Request $request)
    {
        $kehadiran_pl = new KehadiranPusatLatihan;

        $kehadiran_pl->user_id = Auth::user()->id;
        $kehadiran_pl->agensi_id = $request->agensi_id;
        $kehadiran_pl->jadual_kursus_id = $request->jadual_kursus_id;
        $kehadiran_pl->status_kehadiran="Hadir";

        $kehadiran_pl->save();

        alert()->success('Maklumat telah disimpan', 'Berjaya');
        return redirect('/');


    }

    public function show(KehadiranPusatLatihan $kehadiran_pl)
    {
        //
    }

    public function edit(KehadiranPusatLatihan $kehadiran_pl)
    {
        return view('kehadiran_pl.edit',[
            'kehadiran_pl'=>$kehadiran_pl
        ]);
    }

    public function update(Request $request)
    {
        // $kehadiran_pl->pengesahan_kehadiran_pl = $request->pengesahan_kehadiran_pl;

        // $kehadiran_pl->save();

        foreach ($request->kehadiran_pl as $key => $p) {
            $kehadiran_pl = KehadiranPusatLatihan::find($p);
            $kehadiran_pl->pengesahan_kehadiran_pl = "Disahkan";

            $kehadiran_pl->save();
        }

        alert()->success('Peserta telah disahkan', 'Berjaya');
        return redirect('/pengurusan_peserta/semakan_pemohon');

    }


    public function destroy(KehadiranPusatLatihan $kehadiranPusatLatihan)
    {
        //
    }

    public function senarai_qr_pl(){


        $kategori_agensi=KategoriAgensi::where('Kategori_Agensi',['Tempat Kursus'])->first();
        $agensi=Agensi::with(['negeri','daerah'])->where('kategori_agensi',$kategori_agensi->id)->get();

        // dd($kursus);

        return view('kehadiran_pl.senarai_qr_pl',[
            'agensi'=>$agensi
        ]);

        // dd($peserta);
    }


    public function cetak_qr_pl($id){

        $agensi = Agensi::find($id);

        $pdf = PDF::loadView('kehadiran_pl.qr-pl', [
            'agensi'=>$agensi
        ]);

        return $pdf->stream('QRCode Pusat Latihan ' . $agensi->nama_Agensi .'.pdf');
    }
}
