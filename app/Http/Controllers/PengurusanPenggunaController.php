<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        return view('pengurusan_pengguna.senarai_pengguna.staf.index',[
            'staf' => User::where('jenis_pengguna', '!=', 'Peserta ULPK')->get(),
            'peranan' => Role::all(),
        ]);
    }
    public function pekebun_kecil()
    {
        return view('pengurusan_pengguna.senarai_pengguna.pekebun_kecil.index',[
            'pekebun' => User::where('jenis_pengguna', 'Peserta ULPK')->get(),
            'peranan' => Role::all(),
        ]);
    }
    public function ejen_pelaksana()
    {
        return view('pengurusan_pengguna.senarai_pengguna.ejen_pelaksana.index',[
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
}
