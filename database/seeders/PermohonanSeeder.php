<?php

namespace Database\Seeders;

use App\Models\Permohonan;
use Illuminate\Database\Seeder;

class PermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permohonan::create([
            'kod_kursus' => "01",
            'kod_jenis_kursus' => "LUARAN",
            'opt_kategori_kursus' => "1",
            'no_pekerja' => "2",
            'status_permohonan' => "1",
        ]);
        Permohonan::create([
            'kod_kursus' => "02",
            'kod_jenis_kursus' => "LUARAN",
            'opt_kategori_kursus' => "1",
            'no_pekerja' => "2",
            'status_permohonan' => "1",
        ]);
    }
}
