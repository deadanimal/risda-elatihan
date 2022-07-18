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
        $csvFile = fopen(public_path("lokaliti/Seksyen.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Seksyen::create([
                    'U_Seksyen_ID' => $data['0'],
                    'Seksyen' => $data['1'],
                    'kod_seksyen' => $data['2'],
                    'U_Negeri_ID' => $data['4'],
                    'kod_negeri' => $data['5'],
                    'U_Mukim_ID' => $data['6'],
                    'kod_mukim' => $data['7'],
                    'status_seksyen' => '1'
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
