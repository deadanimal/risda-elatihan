<?php

namespace Database\Seeders;

use App\Models\PusatTanggungjawab;
use Illuminate\Database\Seeder;

class PusatTanggungjawabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PusatTanggungjawab::truncate();
        $csvFile = fopen(public_path("lokaliti/Pusat_Tanggungjawab.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                PusatTanggungjawab::create([
                    'kod_PT' => $data['0'],
                    'bahagian' => $data['1'],
                    'kod_Negeri_PT' => $data['2'],
                    'nama_PT' => $data['3'],
                    'alamat_PT_baris1' => $data['4'],
                    'alamat_PT_baris2' => $data['5'],
                    'alamat_PT_baris3' => $data['6'],
                    'alamat_PT_baris4' => $data['7'],
                    'no_Telefon_PT' => $data['8'],
                    'no_Faks_PT' => $data['9'],
                    'email' => $data['10'],
                    'keterangan_PT' => $data['11'],
                    'status_PT' => $data['12']
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
