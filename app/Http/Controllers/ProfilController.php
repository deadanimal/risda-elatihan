<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfilRequest;
use App\Http\Requests\UpdateProfilRequest;
use App\Models\Profil;
use App\Models\User;
use App\Models\PekebunKecil;
use App\Models\Staf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
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
        $user = Auth::user();

        if ($user->jenis_pengguna == 'Peserta ULPK') {
            // check pekebun kecil
            $profil = PekebunKecil::where('id_Pengguna', $user->id)->first();
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
                $nots = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '3b22692be6da322303c98c1541a74f596458d80e')
                    ->get('https://www4.risda.gov.my/fire/getnots/?nokp=' . $user->no_KP)
                    ->getBody()
                    ->getContents();

                $nots = json_decode($nots, true);

                if (!empty($nots[0]['message'])) {
                    $nots = $nots[0]['message'];
                } else {
                    $nots = $nots[0]['noTS'];
                }


                $data = $data_pk[0];
                $tanah = $data['Tanah'];
                $jenis = 'PK';
                return view('profil.index', [
                    'pk' => $data,
                    'user' => $user,
                    'tanah' => $tanah,
                    'profil' => $profil,
                    'jenis' => $jenis,
                    'no_ts' => $nots
                ]);
            }
        } else {
            // check staf
            $data_staf = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', 'f9d00dae5c6d6d549c306bae6e88222eb2f84307')
                ->get('https://www4.risda.gov.my/fire/getallstaff/')
                ->getBody()
                ->getContents();

            $data_staf = json_decode($data_staf, true);
            foreach ($data_staf as $key => $staf) {
                if ($staf['nokp'] == $user->no_KP) {
                    $profil = Staf::where('id_Pengguna', $user->id)->first();
                    $jenis = 'Staf';
                    return view('profil.index_staf', [
                        'user' => $user,
                        'staf' => $staf,
                        'jenis' => $jenis,
                        'profil' => $profil
                    ]);
                }
            }

            // return as ejen pelaksana
            alert()->error('Tiada dalam senarai staf');
            return back();
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
     * @param  \App\Http\Requests\StoreProfilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfilRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(User $profil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfilRequest  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfilRequest $request, User $profil)
    {
        // update profile picture
        if ($request->gambar_profil) {
            $id_pengguna = Auth::id();
            $gambar_profil = time() . '_' . $id_pengguna . '.' . $request->gambar_profil->extension();

            $request->gambar_profil->move(public_path('img/profil'), $gambar_profil);
            $profil->gambar_profil = 'img/profil/' . $gambar_profil;
            $profil->save();

            alert()->success('Gambar profil telah dikemaskini.', 'Berjaya');
            return redirect('/profil');
        }

        // update password
        if ($request->kl_sekarang) {
            if (password_verify($request->kl_sekarang, $profil->password)) {
                $profil->password = Hash::make($request->kl_baru);
                $profil->save();

                alert()->success('Kata laluan telah dikemaskini.', 'Berjaya');
                return back();
            } else {
                alert()->error('Kata laluan yang dimasukkan tidak sepadan.', 'Tidak Berjaya');
                return back();
            }
        }

        // update information (phone number only)
        if ($request->telefon) {

            $user = User::where('id', Auth::id())->first();
            $user->no_telefon = $request->telefon;
            $user->save();

            // if ($request->jenis == 'PK') {
            //     $pekebun_kecil = PekebunKecil::where('id_Pengguna', Auth::id())->first();
            //     $pekebun_kecil->Telefon = $request->telefon;
            //     $pekebun_kecil->save();
            // } else {
            //     $staf = Staf::where('id_Pengguna', Auth::id())->first();
            //     $staf->notel = $request->telefon;
            //     $staf->save();
            // }


            alert()->success('Nombor telefon bimbit anda telah dikemaskini', 'Berjaya');
            return redirect('/profil');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }
}
