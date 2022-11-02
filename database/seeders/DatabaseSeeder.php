<?php

namespace Database\Seeders;

use Database\Seeders\BidangKursusSeeder;
use Database\Seeders\JadualKursusSeeder;
use Database\Seeders\KategoriKursusSeeder;
use Database\Seeders\KehadiranSeeder;
use Database\Seeders\KodKursusSeeder;
use Database\Seeders\PermohonanSeeder;
use Database\Seeders\SqlStafSeeder;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AgamaSeeder::class,
            BangsaSeeder::class,
            DaerahSeeder::class,
            DunSeeder::class,
            KampungSeeder::class,
            MukimSeeder::class,
            NegeriSeeder::class,
            ParlimenSeeder::class,
            PusatTanggungjawabSeeder::class,
            SeksyenSeeder::class,
            StesenSeeder::class,
            RolesAndPermissionsSeeder::class,
            SqlStafSeeder::class,
        ]);
    }
}
