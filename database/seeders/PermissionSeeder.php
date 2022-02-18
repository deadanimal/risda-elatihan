<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        // app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // $permissions = [
        // 'permohonan kursus',
        // 'katelog kursus',
        // 'status permohonan',
        // 'kehadiran',
        // 'pengajian lanjutan',
        // 'penilaian',
        // ];

        // create permissions
        // foreach ($permissions as $permission) {
        //     Permission::create([
        //         'name' => $permission,
        //     ]);
        // }

        $permissions = [
            'kehadiran',
            'pengajian lanjutan',
            'penilaian',
        ];

        // create permissions
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }

        // create roles and assign created permissions

        //Peserta ULS
        // $pesertaUls = Role::create(['name' => 'Peserta ULS']);
        // $pesertaUls = Role::where('name', 'Peserta ULS')->first();

        // $pesertaULSPermission = [
        //     'permohonan kursus',
        //     'katelog kursus',
        //     'status permohonan',
        // ];

        // foreach ($pesertaULSPermission as $permission) {
        //     $pesertaUls->givePermissionTo($permission);
        // }

        //Peserta ULPK
        // $role = Role::create(['name' => 'Peserta ULPK']);

        // //Urus Setia ULS
        // $role = Role::create(['name' => 'Urus Setia ULS']);
        $urussetiaUls = Role::where('name', 'Urus Setia ULS')->first();

        $urussetiaULSPermission = [
            'kehadiran',
            'pengajian lanjutan',
            'penilaian',
        ];

        foreach ($urussetiaULSPermission as $permission) {
            $urussetiaUls->givePermissionTo($permission);
        }

        // //Urus Setia ULPK
        // $role = Role::create(['name' => 'Urus Setia ULPK']);

    }
}
