<?php

namespace Database\Seeders;

use App\Models\KategoriKursus;
use Illuminate\Database\Seeder;

class KategoriKursusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriKursus::create([
            'UL_Kategori_Kursus' => "STAFF",
            'U_Bidang_Kursus' => "1",
            'jenis_Kategori_Kursus' => "LUARAN",
            'kod_Kategori_Kursus' => "01",
            'nama_Kategori_Kursus' => "KATEGORI 1",
            'status_Kategori_Kursus' => "1",
        ]);
        KategoriKursus::create([
            'UL_Kategori_Kursus' => "PEKEBUN KECIL",
            'U_Bidang_Kursus' => "2",
            'jenis_Kategori_Kursus' => "DALAMAN",
            'kod_Kategori_Kursus' => "02",
            'nama_Kategori_Kursus' => "KATEGORI 2",
            'status_Kategori_Kursus' => "1",
        ]);
    }
}
