<?php

namespace Database\Seeders;

use App\Models\Bangsa;
use Illuminate\Database\Seeder;

class BangsaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(public_path("generik/Bangsa.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Bangsa::create([
                    'kod_Bangsa' => $data['0'],
                    'nama_Bangsa' => $data['1'],
                    'status_bangsa' => '1'
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
