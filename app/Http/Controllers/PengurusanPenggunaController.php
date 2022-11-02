<?php

namespace App\Http\Controllers;

use App\Mail\PendaftaranEP;
use App\Mail\PendaftaranPK;
use App\Models\GAP;
use App\Models\PekebunKecil;
use App\Models\Staf;
use App\Models\Tanah;
use App\Models\Tanaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        // return view('pengurusan_pengguna.senarai_pengguna.staf.index2', [
        //     'staf' => Staf::with('pengguna')->get(),
        //     'peranan' => Role::all(),
        // ]);

        return view('pengurusan_pengguna.senarai_pengguna.staf.filter_staf', [
            'gred' => Staf::orderBy('Gred', 'asc')->get()->groupBy('Gred'),
            'namaPT' => Staf::get()->groupBy('NamaPT'),
        ]);

    }

    public function filter_staf(Request $request)
    {
        $staf = Staf::with('pengguna')->where('Gred', $request->gred)->orWhere('NamaPT', $request->namaPT)->get();
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
            'ejen' => User::where('jenis_pengguna', 'Ejen Pelaksana ULS')->orWhere('jenis_pengguna', 'Ejen Pelaksana ULPK')->get(),
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
        } elseif (Route::getCurrentRoute()->uri == "pengurusan_pengguna/pengguna/staf/create") {
            return view('pengurusan_pengguna.senarai_pengguna.staf.create');
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
                ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $request->sec_nric)
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
        $user->no_KP = $request->sec_nric;

        if ($request->jenis_pengguna == 'xdrf') {
            $user->jenis_pengguna = 'Peserta ULPK';
            $user->assignRole('Peserta ULPK');

            // save data pekebun kecil from api
            $data_pk = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', '1cc11a9fec81dc1f99f353f403d6f5bac620aa8f')
                ->get('https://www4.risda.gov.my/espek/portalpkprofiltanah/?nokp=' . $request->sec_nric)
                ->getBody()
                ->getContents();

            $data_pk = json_decode($data_pk, true);
            $data = $data_pk[0];

            $pk = new PekebunKecil;
            $pk->id_Pengguna = $user->id;
            $pk->Jantina_ID = $data['Jantina_ID'];
            $pk->Jantina = $data['Jantina'];
            $pk->Warganegara_ID = $data['Warganegara_ID'];
            $pk->Warganegara = $data['Warganegara'];
            $pk->Bangsa_ID = $data['U_Bangsa_ID'];
            $pk->Bangsa = $data['Bangsa'];
            $pk->Nombor = $data['Nombor'];
            $pk->Jalan = $data['Jalan'];
            $pk->Nama_Kampung = $data['Nama_Kampung'];
            $pk->Bandar = $data['Bandar'];
            $pk->Poskod = $data['Poskod'];
            $pk->U_Negeri_ID = $data['U_Negeri_ID'];
            $pk->Negeri = $data['Negeri'];
            $pk->U_Daerah_ID = $data['U_Daerah_ID'];
            $pk->Daerah = $data['Daerah'];
            $pk->U_Mukim_ID = $data['U_Mukim_ID'];
            $pk->Mukim = $data['Mukim'];
            $pk->U_Kampung_ID = $data['U_Kampung_ID'];
            $pk->Kampung = $data['Kampung'];
            $pk->U_Seksyen_ID = $data['U_Seksyen_ID'];
            $pk->Seksyen = $data['Seksyen'];
            $pk->Penempatan_ID = $data['Penempatan_ID'];
            $pk->Penempatan = $data['Penempatan'];
            $pk->Telefon = $data['Telefon'];
            $pk->U_Parlimen_ID = $data['U_Parlimen_ID'];
            $pk->Parlimen = $data['Parlimen'];
            $pk->U_Dun_ID = $data['U_Dun_ID'];
            $pk->Dun = $data['Dun'];
            $pk->Kod_PT_Lokaliti = $data['Kod_PT_Lokaliti'];
            $pk->Pusat_Tanggungjawab_Lokaliti = $data['Pusat_Tanggungjawab_Lokaliti'];

            $pk->save();

            // save data pekebun kecil from api
            foreach ($data['Tanah'] as $key => $dtanah) {
                $tanah = new Tanah;
                $tanah->id_pekebun_kecil = $pk->id;
                $tanah->U_Tanah_ID = $dtanah['U_Tanah_ID'];
                $tanah->No_Geran = $dtanah['No_Geran'];
                $tanah->No_Lot = $dtanah['No_Lot'];
                $tanah->U_SyaratT_ID = $dtanah['U_SyaratT_ID'];
                $tanah->Syarat = $dtanah['Syarat'];
                $tanah->U_Negeri_ID = $dtanah['U_Negeri_ID'];
                $tanah->U_Daerah_ID = $dtanah['U_Daerah_ID'];
                $tanah->U_Mukim_ID = $dtanah['U_Mukim_ID'];
                $tanah->U_Seksyen_ID = $dtanah['U_Seksyen_ID'];
                $tanah->U_Kampung_ID = $dtanah['U_Kampung_ID'];
                $tanah->U_Parlimen_ID = $dtanah['U_Parlimen_ID'];
                $tanah->U_Dun_ID = $dtanah['U_Dun_ID'];
                $tanah->Luas_Lot = $dtanah['Luas_Lot'];
                $tanah->Bahagian_Pemilikan = $dtanah['Bahagian_Pemilikan'];
                $tanah->Luas_Pemilikan = $dtanah['Luas_Pemilikan'];
                $tanah->Bil_Pemilik_Atas_Geran = $dtanah['Bil_Pemilik_Atas_Geran'];
                $tanah->U_Pengurusan_Tanah_ID = $dtanah['U_Pengurusan_Tanah_ID'];
                $tanah->Pengurusan = $dtanah['Pengurusan'];
                $tanah->U_Taraf_ID = $dtanah['U_Taraf_ID'];
                $tanah->Taraf = $dtanah['Taraf'];
                $tanah->Penempatan_id = $dtanah['Penempatan_id'];
                $tanah->Penempatan = $dtanah['Penempatan'];
                $tanah->Kod_PT_Tanah = $dtanah['Kod_PT_Tanah'];
                $tanah->Pusat_Tanggungjawab_Tanah = $dtanah['Pusat_Tanggungjawab_Tanah'];

                $tanah->save();

                foreach ($dtanah['Tanaman'] as $key => $dtanaman) {
                    $tanaman = new Tanaman;
                    $tanaman->id_tanah = $tanah->id;
                    $tanaman->Jenis_Tanaman = $dtanaman['Jenis_Tanaman'];
                    $tanaman->Peratus_Tanaman = $dtanaman['Peratus_Tanaman'];
                    $tanaman->Luas_Tanaman = $dtanaman['Luas_Tanaman'];
                    $tanaman->U_Lib_Jenis_Tanaman = $dtanaman['U_Lib_Jenis_Tanaman_ID'];
                    $tanaman->Tahun_Tanam = $dtanaman['Tahun_Tanam'];
                    $tanaman->U_Agensi_Bantuan_ID = $dtanaman['U_Agensi_Bantuan_ID'];
                    $tanaman->Agensi = $dtanaman['Agensi'];
                    $tanaman->U_Pendekatan_ID = $dtanaman['U_Pendekatan_ID'];
                    $tanaman->Pendekatan = $dtanaman['Pendekatan'];
                    $tanaman->Hasil = $dtanaman['Hasil'];
                    $tanaman->U_JProduk_ID = $dtanaman['U_JProduk_ID'];
                    $tanaman->Produk = $dtanaman['Produk'];
                    $tanaman->U_SPengusahan_ID = $dtanaman['U_SPengusahan_ID'];
                    $tanaman->Status = $dtanaman['Status'];

                    $tanaman->save();

                    foreach ($dtanaman['GAP'] as $key => $dgap) {
                        $gap = new GAP;
                        $gap->id_tanaman=$tanaman->id;
                        $gap->U_JnsAmalan_ID=$dgap['U_JnsAmalan_ID'];
                        $gap->Amalan=$dgap['Amalan'];
                        $gap->U_Tahap_ID=$dgap['U_Tahap_ID'];
                        $gap->Tahap=$dgap['Tahap'];

                        $gap->save();
                    }
                }
            }
            Mail::to($request->email)->send(new PendaftaranPK($user));
        } elseif ($request->jenis_pengguna == 'ep') {

            try {
                if (Auth::user()->jenis_pengguna == 'Urus Setia ULS') {
                    $user->jenis_pengguna = 'Ejen Pelaksana ULS';
                    $user->assignRole('Ejen Pelaksana ULS');
                } elseif (Auth::user()->jenis_pengguna == 'Urus Setia ULPK') {
                    $user->jenis_pengguna = 'Ejen Pelaksana ULPK';
                    $user->assignRole('Ejen Pelaksana ULPK');
                } else {
                    $user->jenis_pengguna = $request->jenis_pengguna_2;
                    $user->assignRole($request->jenis_pengguna_2);
                }
            } catch (\Throwable $th) {
                if (str_contains(Auth::user()->jenis_pengguna, 'ULS')) {
                    alert()->error('Sila tambah peranan "Ejen Pelaksana ULS" di bahagian Kumpulan Pengguna.');
                } elseif (str_contains(Auth::user()->jenis_pengguna, 'ULPK')) {
                    alert()->error('Sila tambah peranan "Ejen Pelaksana ULPK" di bahagian Kumpulan Pengguna.');
                } else {
                    alert()->error('Sila tambah peranan "Ejen Pelaksana ULS" atau "Ejen Pelaksana ULPK" di bahagian Kumpulan Pengguna.');
                }

                return back();
            }
            Mail::to($request->email)->send(new PendaftaranEP($user));
        }
        $user->save();

        alert()->success('E-mel telah dihantar ke e-mel yang dimasukkan sebentar tadi. Kata laluan ditetapkan ialah RISDA2022', 'Pendaftaran Berjaya')->persistent('Tutup');;

        if ($request->jenis_pengguna == 'xdrf') {
            return redirect('/pengurusan_pengguna/pengguna/pekebun_kecil');
        } else {
            return redirect('/pengurusan_pengguna/pengguna/ejen_pelaksana');
        }
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
        $user->syncRoles($request->jenis_pengguna);
        $user->save();

        // return redirect('/pengurusan_pengguna/pengguna/staf');
        alert()->success('Akaun bagi ' . $user->name . ' telah dikemaskini', 'Berjaya');
        return redirect()->back();
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
        return redirect()->back();
    }


    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $check = Staf::where('id_Pengguna', $user->id)->first();
        if ($check != null) {
            $check->delete();
        }
        $user->delete();

        alert()->success('Data' . $user->name . ' telah dihapuskan', 'Berjaya');
        return redirect()->back();
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

    public function semak_nric_staf(Request $request)
    {
        $data_staf = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', 'f9d00dae5c6d6d549c306bae6e88222eb2f84307')
            ->get('https://www4.risda.gov.my/fire/getallstaff/')
            ->getBody()
            ->getContents();

        $data_staf = json_decode($data_staf, true);
        foreach ($data_staf as $key => $staf) {
            if ($staf['nokp'] == $request->no_KP) {

                // create staff
                $user = new User;
                $user->name = $staf['nama'];
                $user->email = $staf['email']; #tukar email staf
                $user->password = Hash::make('pnsb1234');
                $user->no_KP = $staf['nokp'];
                $user->jenis_pengguna = 'Peserta ULS';
                $user->assignRole('Peserta ULS');
                $user->status_akaun = '1';

                $user->save();

                $reg_staf = new Staf;
                $reg_staf->id_Pengguna = $user->id;
                $reg_staf->nopekerja = $staf['nopekerja'];
                $reg_staf->GelaranJwtn = $staf['GelaranJwtn'];
                $reg_staf->Gred = $staf['Gred'];
                $reg_staf->Jawatan = $staf['Jawatan'];
                $reg_staf->Kod_PT = $staf['Kod_PT'];
                $reg_staf->NamaPT = $staf['NamaPT'];
                $reg_staf->Negeri = $staf['Negeri'];
                $reg_staf->NamaPA = $staf['NamaPA'];
                $reg_staf->NamaUnit = $staf['NamaUnit'];
                $reg_staf->StesenBertugas = $staf['NamaUnit'];
                $reg_staf->notel = $staf['notel'];
                $reg_staf->save();

                alert()->success('Staf telah didaftarkan. Kata laluan default ialah pnsb1234', 'Berjaya')->persistent('Tutup');;
                return redirect('/pengurusan_pengguna/pengguna/staf');
            }
        }


    }
}
