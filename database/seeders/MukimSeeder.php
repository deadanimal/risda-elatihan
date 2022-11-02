<?php

namespace Database\Seeders;

use App\Models\Mukim;
use Illuminate\Database\Seeder;

class MukimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(public_path("lokaliti/Mukim.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Mukim::create([
                    'U_Mukim_ID' => $data['0'],
                    'Mukim' => $data['1'],
                    'Kod_Mukim' => $data['2'],
                    'U_Negeri_ID' => $data['3'],
                    'Kod_Negeri' => $data['4'],
                    'U_Daerah_ID' => $data['5'],
                    'Kod_Daerah' => $data['6'],
                    'Stesen_Kod' => $data['4'],
                    'status_mukim' => $data['13'],
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
