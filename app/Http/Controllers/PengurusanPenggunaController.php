<?php

namespace App\Http\Controllers;

use App\Mail\PendaftaranEP;
use App\Mail\PendaftaranPK;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Symfony\Component\Translation\Provider\Dsn;

class PengurusanPenggunaController extends Controller
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

    // list user
    public function staf()
    {
        $staf = User::where('jenis_pengguna', '!=', 'Peserta ULPK')->where('jenis_pengguna', '!=', 'Ejen Pelaksana')->get();
        $data_staf = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', 'f9d00dae5c6d6d549c306bae6e88222eb2f84307')
            ->get('https://www4.risda.gov.my/fire/getallstaff/')
            ->getBody()
            ->getContents();

        $data_staf = json_decode($data_staf, true);
        // dd($data_staf);
        foreach ($staf as $key => $s) {
            foreach ($data_staf as $key => $ds) {
                if ($ds['nokp'] == $s->no_KP) {
                    $s->no_pekerja = $ds['nopekerja'];
                    $s->pusat_tanggungjawab = $ds['NamaPT'];
                    $s->gred = $ds['Gred'];
                    $s->jawatan = $ds['Jawatan'];
                }
            }
        }
        // dd($staf);
        return view('pengurusan_pengguna.senarai_pengguna.staf.index2', [
            'staf' => $staf,
            'peranan' => Role::all(),
        ]);
    }
    public function pekebun_kecil()
    {
        $pekebun = User::where('jenis_pengguna', 'Peserta ULPK')->get();
        foreach ($pekebun as $key => $pk) {
            $data_pk = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '1cc11a9fec81dc1f99f353f403d6f5bac620aa8f')
                ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $pk->no_KP)
                ->getBody()
                ->getContents();

            $data_pk = json_decode($data_pk, true);
            if (!empty($data_pk['NamaPT'])) {
                $pk->pusat_tanggungjawab = $data_pk['NamaPT'];
            } else {
                $pk->pusat_tanggungjawab = null;
            }
        }

        return view('pengurusan_pengguna.senarai_pengguna.pekebun_kecil.index', [
            'pekebun' => $pekebun,
            'peranan' => Role::all(),
        ]);
    }
    public function ejen_pelaksana()
    {
        return view('pengurusan_pengguna.senarai_pengguna.ejen_pelaksana.index', [
            'ejen' => User::where('jenis_pengguna', 'Ejen Pelaksana')->get(),
            'peranan' => Role::all(),
        ]);
    }

    public function index()
    {
        dd('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Route::getCurrentRoute()->uri);
        if (Route::getCurrentRoute()->uri == "pengurusan_pengguna/pengguna/pekebun_kecil/create") {
            return view('pengurusan_pengguna.senarai_pengguna.pekebun_kecil.create');
        } elseif (Route::getCurrentRoute()->uri == "pengurusan_pengguna/pengguna/ejen_pelaksana/create") {
            return view('pengurusan_pengguna.senarai_pengguna.ejen_pelaksana.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        if ($request->jenis_pengguna != 'xdrf') {
            if ($request->jenis_pengguna != 'ep') {
                alert()->error('Maaf, sila daftar mengikut SOP yang betul. Terima Kasih', 'Pendaftaran Gagal');
            }
        } else {
            $data_pk = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '1cc11a9fec81dc1f99f353f403d6f5bac620aa8f')
                ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $request->no_KP)
                ->getBody()
                ->getContents();

            $data_pk = json_decode($data_pk, true);

            if (!empty($data_pk['message'])) {
                alert()->error('Maaf, nombor kad pengenalan yang dimasukkan tiada dalam pangkalan data HRIP', 'Tiada Maklumat');
                return redirect('/pengurusan_pengguna/pengguna/pekebun_kecil/create');
            } 
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('RISDA2022');
        $user->no_KP = $request->no_KP;
        if ($request->jenis_pengguna = 'xdrf') {
            $user->jenis_pengguna = 'Peserta ULPK';
            $user->assignRole('Peserta ULPK');
            Mail::to($request->email)->send(new PendaftaranPK($user));
        } elseif ($request->jenis_pengguna = 'ep') {
            $user->jenis_pengguna = 'Ejen Pelaksana';
            $user->assignRole('Ejen Pelaksana');
            Mail::to($request->email)->send(new PendaftaranEP($user));
        }

        $user->save();

        alert()->success('Sila semak email anda untuk notifikasi pendaftaran.', 'Pendaftaran Berjaya');
        return redirect('/pengurusan_pengguna/pengguna/pekebun_kecil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->jenis_pengguna = $request->jenis_pengguna;
        $user->assignRole($request->jenis_pengguna);
        $user->save();

        return redirect('/pengurusan_pengguna/senarai_pengguna/staf');
    }

    public function pengaktifan(Request $request, $id)
    {
        if (empty($request->status)) {
            $request->status = null;
        }
        $user = User::find($id);
        $user->status_akaun = $request->status;
        $user->save();

        alert()->success('Akaun bagi ' . $user->name . ' telah dikemaskini', 'Berjaya');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function semak_nric(Request $request)
    {
        $data_pk = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '1cc11a9fec81dc1f99f353f403d6f5bac620aa8f')
            ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $request->no_KP)
            ->getBody()
            ->getContents();

        $data_pk = json_decode($data_pk, true);

        if (!empty($data_pk['message'])) {
            alert()->error('Maaf, nombor kad pengenalan yang dimasukkan tiada dalam pangkalan data HRIP', 'Tiada Maklumat');
            return back();
        } else {
            // dd($data_pk);
            return view('pengurusan_pengguna.senarai_pengguna.pekebun_kecil.maklumat_pk', [
                'pekebun' => $data_pk[0]
            ]);
        }
    }
}
