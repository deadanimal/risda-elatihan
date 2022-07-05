<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'pengurusan pengguna']);
        Permission::create(['name' => 'pengurusan kursus']);
        Permission::create(['name' => 'pencalonan peserta']);
        Permission::create(['name' => 'semakan permohonan']);
        Permission::create(['name' => 'utiliti']);
        Permission::create(['name' => 'katalog kursus']);
        Permission::create(['name' => 'status permohonan']);
        Permission::create(['name' => 'kehadiran']);
        Permission::create(['name' => 'pelajar praktikal']);
        Permission::create(['name' => 'pengajian lanjutan']);
        Permission::create(['name' => 'jawab penilaian']);
        Permission::create(['name' => 'cipta penilaian']);
        Permission::create(['name' => 'laporan']);
        Permission::create(['name' => 'audit trail']);
        Permission::create(['name' => 'perbelanjaan']);

        $adminbtm = Role::create(['name' => 'Superadmin BTM'])
            ->givePermissionTo(Permission::all());

        $superAdminUls = Role::create(['name' => 'Superadmin ULS'])
            ->givePermissionTo(Permission::all());

        $superAdminUlpk = Role::create(['name' => 'Superadmin ULPK'])
            ->givePermissionTo(Permission::all());

        $pentadbiranSistemUls = Role::create(['name' => 'Pentadbiran Sistem ULS'])
            ->givePermissionTo([
                'audit trail',
                'pengurusan pengguna'
            ]);

        $pentadbiranSistemUlpk = Role::create(['name' => 'Pentadbiran Sistem ULPK'])
            ->givePermissionTo([
                'audit trail',
                'pengurusan pengguna',
                'utiliti'
            ]);

        $urusSetiaUls = Role::create(['name' => 'Urus Setia ULS'])
            ->givePermissionTo([
                'pengurusan kursus',
                'pencalonan peserta',
                'semakan permohonan',
                'cipta penilaian',
                'jawab penilaian',
                'kehadiran',
                'perbelanjaan',
                'laporan',
                'utiliti',
                'pengajian lanjutan'
            ]);

        $urusSetiaUlpk = Role::create(['name' => 'Urus Setia ULPK'])
            ->givePermissionTo([
                'pengurusan kursus',
                'pencalonan peserta',
                'semakan permohonan',
                'cipta penilaian',
                'jawab penilaian',
                'kehadiran',
                'perbelanjaan',
                'laporan',
                'utiliti'
            ]);

        $penyelarasPesertaUls = Role::create(['name' => 'Penyelaras Peserta ULS'])
            ->givePermissionTo([
                'pencalonan peserta',
                'laporan',
                'pelajar praktikal'
            ]);

        $penyelarasPesertaUlpk = Role::create(['name' => 'Penyelaras Peserta ULPK'])
            ->givePermissionTo([
                'pengurusan pengguna',
                'pencalonan peserta',
            ]);

        $penyokongUls = Role::create(['name' => 'Penyokong ULS'])
            ->givePermissionTo([
                'semakan permohonan',
                'jawab penilaian'
            ]);

        $penyeliaUls = Role::create(['name' => 'Penyelia ULS'])
            ->givePermissionTo([
                'jawab penilaian',
                'laporan'
            ]);

        $bpsm = Role::create(['name' => 'Bahagian Pengurusan Sumber Manusia (Unit Perkhidmatan)'])
            ->givePermissionTo([
                'laporan'
            ]);

        $pesertaUls = Role::create(['name' => 'Peserta ULS'])
            ->givePermissionTo([
                'jawab penilaian',
                'katalog kursus',
                'status permohonan',
                'kehadiran',
            ]);

        $pesertaUlpk = Role::create(['name' => 'Peserta ULPK'])
            ->givePermissionTo([
                'jawab penilaian',
                'katalog kursus',
                'status permohonan',
                'kehadiran',
            ]);

        $ejenPelaksanaUls = Role::create(['name' => 'Ejen Pelaksana ULS'])
            ->givePermissionTo([
                'laporan',
                'cipta penilaian'
            ]);

        $ejenPelaksanaUlpk = Role::create(['name' => 'Ejen Pelaksana ULPK'])
            ->givePermissionTo([
                'laporan',
                'cipta penilaian',
                'kehadiran'
            ]);
        
    }
}
