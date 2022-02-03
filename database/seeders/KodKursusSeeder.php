<?php

namespace Database\Seeders;

use App\Models\KodKursus;
use Illuminate\Database\Seeder;

class KodKursusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KodKursus::create([
            'UL_Kod_Kursus' => "STAFF",
            'tahun_Kursus' => "2021",
            'tarikh_daftar_Kursus' => "2022-01-25",
            'U_Bidang_Kursus' => "1",
            'U_Kategori_Kursus' => "1",
            'kod_Kursus' => "01",
            'tajuk_Kursus' => "Kursus 1",
            'status_Kod_Kursus' => "1",
            "tempat_khusus" => "Dewan1",
        ]);
        KodKursus::create([
            'UL_Kod_Kursus' => "PEKEBUN KECIL",
            'tahun_Kursus' => "2021",
            'tarikh_daftar_Kursus' => "2022-01-15",
            'U_Bidang_Kursus' => "2",
            'U_Kategori_Kursus' => "2",
            'kod_Kursus' => "02",
            'tajuk_Kursus' => "Kursus 2",
            'status_Kod_Kursus' => "1",
            "tempat_khusus" => "Dewan2",
        ]);
    }
}
