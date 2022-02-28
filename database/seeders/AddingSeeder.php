<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AddingSeeder extends Seeder
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

        //Peserta ULS
        $pesertaUls = Role::where('name', 'Peserta ULS')->firstOrFail();

        $pesertaULSPermission = [
            // 'permohonan kursus',
            // 'katelog kursus',
            // 'status permohonan',
            'penilaian',
        ];

        foreach ($pesertaULSPermission as $permission) {
            $pesertaUls->givePermissionTo($permission);
        }

    }
}
