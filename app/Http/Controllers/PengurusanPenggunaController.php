<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
    public function urusetia()
    {
        $user = User::all();
        $list_us = [];
        foreach ($user as $key => $u) {
            $jenis_pengguna = substr($u->jenis_pengguna, 0, 10);
            if ($jenis_pengguna == 'Urus Setia') {
                array_push($list_us, $u);
            }
        }
        return view('pengurusan_pengguna.senarai_pengguna.urusetia.index',[
            'urusetia' => $list_us,
            'peranan' => Role::all()
        ]);
    }
    public function peserta()
    {
        return view('pengurusan_pengguna.senarai_pengguna.peserta.index');
    }
    public function ejen_pelaksana()
    {
        return view('pengurusan_pengguna.senarai_pengguna.ejen_pelaksana.index');
    }

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
        $user->jenis_pengguna = $request->peranan;
        $user->assignRole($request->peranan);
        $user->save();
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
