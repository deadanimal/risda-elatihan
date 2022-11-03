<?php

namespace Database\Seeders;

use App\Models\JadualKursus;
use Illuminate\Database\Seeder;

class JadualKursusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JadualKursus::create([
            'kod_agensi' => "1",
            'kod_jenis_kursus' => "LUARAN",
            'kod_kategori' => "1",
            'kod_kursus' => "01",
            'tahun' => "2021",
            'tarikh_mula' => "2022-01-10",
            'tarikh_tamat' => "2022-01-13",
            'peruntukan_mengurus' => "RM100",
            'peruntukan_pembangunan' => "RM100",
            'peruntukan_sumber' => "RM100",
            'bilangan_hari' => "4",
            'id_siri' => "1",
            'nota_rujukan' => "NOTANOTA",
            'sijil_kursus' => "SIJILL",
        ]);
    }
}
