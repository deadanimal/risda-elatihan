<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'AM',
            'email'=>Str::random(10).'@gmail.com',
            'password'=>Hash::make('pnsb123'),
            'jenis_pengguna'=>'Urus Setia ULS',
            'no_KP'=>'000000000003',
        ]);

        User::create([
            'name'=>'JAN',
            'email'=>Str::random(10).'@gmail.com',
            'password'=>Hash::make('pnsb123'),
            'jenis_pengguna'=>'Peserta ULS',
            'no_KP'=>'000000000004',
        ]);
    }
}
