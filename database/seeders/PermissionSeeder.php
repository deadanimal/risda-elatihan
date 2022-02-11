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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'role_create',
            'role_edit',
            'role_show',
            'role_delete',
            'role_access', // access to whole menu items
            'user_create',
            'user_edit',
            'user_show',
            'user_delete',
            'user_access',
        ];

        // create permissions
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }

        // create roles and assign created permissions

        //Peserta ULS
        $role = Role::create(['name' => 'Peserta ULS']);

        $userPermission = [
            'user_edit',
            'user_show',
            'user_access',
        ];

        foreach ($userPermission as $permission) {
            $role->givePermissionTo($permission);
        }

        //Peserta ULPK
        $role = Role::create(['name' => 'Peserta ULPK']);

        //Urus Setia ULS
        $role = Role::create(['name' => 'Urus Setia ULS']);

        //Urus Setia ULPK
        $role = Role::create(['name' => 'Urus Setia ULPK']);

    }
}
