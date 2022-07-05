<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PerananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengurusan_pengguna.peranan.index', [
            'peranan' => Role::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengurusan_pengguna.peranan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Role::create(['name' => $request->name]);
        $peranan = new Role($request->all());
        $peranan->save();
        AuditTrailController::audit('pengurusan pengguna', 'peranan', 'cipta', $peranan->name);
        alert()->success('Peranan telah ditambah', 'Berjaya');
        return redirect('/pengurusan_pengguna/peranan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pengurusan_pengguna.peranan.show', [
            'peranan' => Role::find($id),
            'kebenaran' => Permission::all(),
            'id' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('pengurusan_pengguna.peranan.edit', [
            'role'=>$role
        ]);
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
        // dd($request);
        $nama_role = Role::where('id', $id)->first();
        $nama_role = $nama_role->name;
        $role = Role::findByName($nama_role);
        $kebenaran = Permission::get();

        foreach ($kebenaran as $kebenaran) {
            $role->revokePermissionTo($kebenaran->name);
            $nama = str_replace(" ", "_", $kebenaran->name);
            if ($request->$nama == "1") {
                $role->givePermissionTo($kebenaran->name);
            }
        }

        AuditTrailController::audit('pengurusan pengguna', 'peranan', 'kemaskini', $role->name);
        alert()->success('Kebenaran telah dikemaskini', 'Berjaya');
        return redirect('/pengurusan_pengguna/peranan/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peranan = Role::find($id);
        $peranan->delete();
        AuditTrailController::audit('pengurusan pengguna', 'peranan', 'hapus', $peranan->name);
        alert()->success('Peranan telah dihapuskan', 'Hapus');
        return redirect('/pengurusan_pengguna/peranan');
    }

    public function tambah_kebenaran(Request $request)
    {
        Permission::create(['name' => $request->name]);
        return redirect('/pengurusan_pengguna/peranan');
    }

    public function tukar_nama(Request $request, $id)
    {
        $peranan = Role::find($id);
        $peranan->name = $request->name;
        $peranan->save();

        return redirect('/');
    }
}
