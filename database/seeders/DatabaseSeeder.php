<?php

namespace Database\Seeders;

use Database\Seeders\BidangKursusSeeder;
use Database\Seeders\JadualKursusSeeder;
use Database\Seeders\KategoriKursusSeeder;
use Database\Seeders\KehadiranSeeder;
use Database\Seeders\KodKursusSeeder;
use Database\Seeders\PermohonanSeeder;
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
            BidangKursusSeeder::class,
            KategoriKursusSeeder::class,
            KodKursusSeeder::class,
            JadualKursusSeeder::class,
            KehadiranSeeder::class,
            PermohonanSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

// KategoriKursus

//         KodKursus

    }
}
