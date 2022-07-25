<?php

namespace Database\Seeders;

use App\Models\Parlimen;
use Illuminate\Database\Seeder;

class ParlimenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(public_path("lokaliti/Parlimen.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Parlimen::create([
                    'U_Parlimen_ID' => $data['0'],
                    'Parlimen' => $data['1'],
                    'U_Negeri_ID' => $data['2'],
                    'Kod_Parlimen' => $data['3'],
                    'status_parlimen' => '1'
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
