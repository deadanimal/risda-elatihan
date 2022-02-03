<?php

namespace Database\Seeders;

use App\Models\BidangKursus;
use Illuminate\Database\Seeder;

class BidangKursusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BidangKursus::create([
            'UL_Bidang_Kursus' => "STAFF",
            'kod_Bidang_Kursus' => "01",
            'nama_Bidang_Kursus' => "Bidang1",
            'status_Bidang_Kursus' => "1",
        ]);
        BidangKursus::create([
            'UL_Bidang_Kursus' => "PEKEBUN KECIL",
            'kod_Bidang_Kursus' => "02",
            'nama_Bidang_Kursus' => "Bidang2",
            'status_Bidang_Kursus' => "1",
        ]);

    }
}
