<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(public_path("generik/Agama.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Agama::create([
                    'kod_Agama' => $data['0'],
                    'nama_Agama' => $data['1'],
                    'status_agama' => '1'
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
