<?php

namespace Database\Seeders;

use App\Models\Stesen;
use Illuminate\Database\Seeder;

class StesenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(public_path("lokaliti/Stesen.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Stesen::create([
                    'Stesen_kod' => $data['0'],
                    'U_Negeri_ID' => $data['1'],
                    'keterangan' => $data['2'],
                    'Kod_PT' => $data['3'],
                    'status_stesen' => $data['4']
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
