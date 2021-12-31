<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfilRequest;
use App\Http\Requests\UpdateProfilRequest;
use App\Models\Profil;
use App\Models\User;
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

        $data = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '1cc11a9fec81dc1f99f353f403d6f5bac620aa8f')
            ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $user->no_KP)
            ->getBody()
            ->getContents();

        $profil = json_decode($data, true);
        if(!empty($profil['message'])){
            return view('profil.test1',[
                'user'=>$user
            ]);
        }
        $profil = $profil[0];
        $tanah = $profil['Tanah'];

        return view('profil.index', [
            'profil' => $profil,
            'user' => $user,
            'tanah' => $tanah
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
    public function edit(Profil $profil)
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
        if ($request->gambar_profil) {
            $id_pengguna = Auth::id();
            $gambar_profil = time() . '_' . $id_pengguna . '.' . $request->gambar_profil->extension();

            $request->gambar_profil->move(public_path('img/profil'), $gambar_profil);
            $profil->gambar_profil = 'img/profil/'.$gambar_profil;
            $profil->save();

            alert()->success('Gambar profil telah dikemaskini.', 'Berjaya');
            return back();
            // return back()
            //     ->with('success', 'Gambar profil sudah berjaya dikemaskini')
            //     ->with('image', $gambar_profil);
        }
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
