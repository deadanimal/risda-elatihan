<?php

namespace Database\Seeders;

use App\Models\SubJadualKursus;
use Illuminate\Database\Seeder;

class SubJadualKursusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubJadualKursus::create([
            'jadual_kursus_id' => "",
        ]);
    }
}
