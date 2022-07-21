<?php

namespace Database\Seeders;

use App\Models\Seksyen;
use Illuminate\Database\Seeder;

class SeksyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seksyen::truncate();
        $csvFile = fopen(public_path("lokaliti/Seksyen.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Seksyen::create([
                    'U_Seksyen_ID' => $data['0'],
                    'Seksyen' => $data['1'],
                    'kod_seksyen' => $data['2'],
                    'U_Negeri_ID' => $data['3'],
                    'kod_negeri' => $data['4'],
                    'U_Daerah_ID' => $data['5'],
                    'kod_daerah' => $data['6'],
                    'U_Mukim_ID' => $data['7'],
                    'kod_mukim' => $data['8'],
                    'status_seksyen' => $data['9']
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
