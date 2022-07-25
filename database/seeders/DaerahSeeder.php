<?php

namespace Database\Seeders;

use App\Models\Daerah;
use Illuminate\Database\Seeder;

class DaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(public_path("lokaliti/Daerah.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Daerah::create([
                    'U_Daerah_ID' => $data['0'],
                    'Daerah' => $data['1'],
                    'Kod_Daerah' => $data['2'],
                    'U_Negeri_ID' => $data['3'],
                    'status_daerah' => $data['8']
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
