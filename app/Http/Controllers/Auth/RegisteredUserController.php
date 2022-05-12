<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PekebunKecil;
use App\Models\Tanaman;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\PendaftaranPK;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis_pengguna' => 'Peserta ULS',
            'no_KP' => $request->no_KP,
        ]);

        event(new Registered($user));

        $data_pk = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '1cc11a9fec81dc1f99f353f403d6f5bac620aa8f')
            ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $request->no_KP)
            ->getBody()
            ->getContents();

        $data_pk = json_decode($data_pk, true);
        
        $pk = PekebunKecil::create([
            'id_Pengguna' => $user['id'],
            'Jantina_ID' => $data_pk['Jantina_ID'],
            'Jantina' => $data_pk['Jantina'],
            'Warganegara_ID' => $data_pk['Warganegara_ID'],
            'Warganegara' => $data_pk['Warganegara'],
            'Bangsa_ID' => $data_pk['Bangsa_ID'],
            'Bangsa' => $data_pk['Bangsa'],
            'Jalan' => $data_pk['Jalan'],
            'Nama_Kampung' => $data_pk['Nama_Kampung'],
            'Bandar' => $data_pk['Bandar'],
            'Poskod' => $data_pk['Poskod'],
            'U_Negeri_ID' => $data_pk['U_Negeri_ID'],
            'Negeri' => $data_pk['U_Negeri_ID'],
            'U_Daerah_ID' => $data_pk['U_Daerah_ID'],
            'Daerah' => $data_pk['Daerah'],
            'U_Mukim_ID' => $data_pk['U_Mukim_ID'],
            'Mukim' => $data_pk['Mukim'],
            'U_Kampung_ID' => $data_pk['U_Kampung_ID'],
            'Kampung' => $data_pk['Kampung'],
            'U_Seksyen_ID' => $data_pk['U_Seksyen_ID'],
            'Seksyen' => $data_pk['Seksyen'],
            'Penempatan_ID' => $data_pk['Penempatan_ID'],
            'Penempatan' => $data_pk['Penempatan'],
            'Telefon' => $data_pk['Telefon'],
        ]);

        event(new Registered($pk));


        $tanahs = $pk['Tanah'];
        foreach ($tanahs as $tanah) {
            dd($tanah['No_Geran']);

            $d_tanah = PekebunKecil::create([
                'id_pekebun_kecil' => $pk['id'],
                'U_Tanah_ID' => $tanah['U_Tanah_ID'],
                'No_Geran' => $tanah['No_Geran'],
                'No_Lot' => $tanah['No_Lot'],
                'U_SyaratT_ID' => $tanah['U_SyaratT_ID'],
                'Syarat' => $tanah['Syarat'],
                'U_Negeri_ID' => $tanah['U_Negeri_ID'],
                'U_Daerah_ID' => $tanah['U_Daerah_ID'],
                'U_Mukim_ID' => $tanah['U_Mukim_ID'],
                'U_Seksyen_ID' => $tanah['U_Seksyen_ID'],
                'U_Kampung_ID' => $tanah['U_Kampung_ID'],
                'U_Parlimen_ID' => $tanah['U_Parlimen_ID'],
                'U_Dun_ID' => $tanah['U_Dun_ID'],
                'Luas_Lot' => $tanah['Luas_Lot'],
                'DaeBahagian_Pemilikanrah' => $tanah['Bahagian_Pemilikan'],
                'Luas_Pemilikan' => $tanah['Luas_Pemilikan'],
            ]);

            event(new Registered($d_tanah));

            $tanamans = $tanah['Tanaman'];
            foreach($tanamans as $tanaman){
                $d_tanaman = Tanaman::create([
                    'id_tanah' => $d_tanah['id'],
                    'Jenis_Tanaman' => $tanaman['Jenis_Tanaman'],
                    'Peratus_Tanaman' => $tanaman['Peratus_Tanaman'],
                    'Luas_Tanaman' => $tanaman['Luas_Tanaman'],
                ]);

                event(new Registered($d_tanaman));
            }
        }

        Mail::to($request->email)->send(new PendaftaranPK($user));
        alert()->success('Sila semak email anda untuk notifikasi pendaftaran.','Pendaftaran Berjaya');

        Auth::login($user);
        return redirect('/');
    }
}
