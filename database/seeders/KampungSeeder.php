<?php

namespace Database\Seeders;

use App\Models\Kampung;
use Illuminate\Database\Seeder;

class KampungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(public_path("lokaliti/Kampung.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Kampung::create([
                    'U_Kampung_ID' => $data['0'],
                    'Kampung' => $data['1'],
                    'Kod_Kampung' => $data['2'],
                    'U_Negeri_ID' => $data['3'],
                    'Kod_Negeri' => $data['3'],
                    'U_Daerah_ID' => $data['3'],
                    'Kod_Daerah' => $data['3'],
                    'U_Mukim_ID' => $data['3'],
                    'Kod_Mukim' => $data['3'],
                    'status_kampung' => '1'
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
