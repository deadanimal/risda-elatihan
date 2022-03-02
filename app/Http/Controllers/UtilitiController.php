<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUtilitiRequest;
use App\Http\Requests\UpdateUtilitiRequest;
use App\Models\PekebunKecil;
use App\Models\Staf;
use App\Models\Tanah;
use App\Models\Tanaman;
use App\Models\User;
use App\Models\Utiliti;
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
            'user'=>$user,
            'role'=>$role
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
}
