<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUtilitiRequest;
use App\Http\Requests\UpdateUtilitiRequest;
use App\Models\PekebunKecil;
use App\Models\Permohonan;
use App\Models\Staf;
use App\Models\Tanah;
use App\Models\Tanaman;
use App\Models\User;
use App\Models\Utiliti;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Spatie\Permission\Models\Role;

class UtilitiController extends Controller
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
     * @param  \App\Http\Requests\StoreUtilitiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUtilitiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Utiliti  $utiliti
     * @return \Illuminate\Http\Response
     */
    public function show(Utiliti $utiliti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Utiliti  $utiliti
     * @return \Illuminate\Http\Response
     */
    public function edit(Utiliti $utiliti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUtilitiRequest  $request
     * @param  \App\Models\Utiliti  $utiliti
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUtilitiRequest $request, Utiliti $utiliti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Utiliti  $utiliti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utiliti $utiliti)
    {
        //
    }

    // test
    public function test_user_list()
    {
        $user = User::all();
        $role = Role::all();
        return view('test_list', [
            'user' => $user,
            'role' => $role
        ]);
    }

    public function test_user_delete($id)
    {
        $pekebun = PekebunKecil::where('id_pengguna', $id)->first();

        if ($pekebun != null) {

            $tanah = Tanah::where('id_pekebun_kecil', $pekebun->id)->first();
            if ($tanah != null) {
                $tanaman = Tanaman::where('id_tanah', $tanah->id)->get();

                foreach ($tanaman as $key => $t) {
                    $t->delete();
                }
                $tanah->delete();
            }
            $pekebun->delete();
        }

        $staf = Staf::where('id_pengguna', $id)->first();
        if ($staf != null) {
            $staf->delete();
        }
        $user = User::find($id);
        $user->delete();
        return redirect('/testing');
    }

    public function test_user_update_role(UpdateUtilitiRequest $request, $id)
    {
        $pengguna = User::find($id);
        $pengguna->assignRole($request->peranan);
        alert()->success('dah tukar role', 'jadi');
        return redirect('/testing');
    }

    public function r_espek()
    {
        ini_set('max_execution_time', 1800);
        $data_staf = Http::withBasicAuth('99891c082ecccfe91d99a59845095f9c47c4d14e', 'f9d00dae5c6d6d549c306bae6e88222eb2f84307')
            ->get('https://www4.risda.gov.my/fire/getallstaff/')
            ->getBody()
            ->getContents();

        $data_staf = json_decode($data_staf, true);
        // $user = User::all();
        foreach ($data_staf as $key => $staf) {
            $user = new User;
            $user->name = $staf['nama'];
            $user->email = $staf['email'];
            $user->password = Hash::make('pnsb1234');
            $user->no_KP = $staf['nokp'];
            $user->jenis_pengguna = 'Peserta ULS';
            $user->assignRole('Peserta ULS');
            $user->no_telefon = $staf['notel'];
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
        }

        alert()->success('Habis');
        // set_time_limit(300);
        return redirect('/testing');
    }

    public function remove_user_uls()
    {
        $user = User::where('jenis_pengguna', 'Peserta ULS')->get();

        foreach ($user as $key => $u) {
            $permohonan = Permohonan::where('no_pekerja', $u->id)->get();
            if ($permohonan != null) {
                foreach ($permohonan as $key => $p) {
                    $p->delete();
                }
            }
            $u->delete();

            $staf = Staf::where('id_Pengguna', $u->id)->first();
            $staf->delete();
        }

        alert()->success('Habis');
        return redirect('/testing');
    }
}
