<?php

namespace Database\Seeders;

use App\Models\Negeri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NegeriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(public_path("lokaliti/Negeri.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Negeri::create([
                    'U_Negeri_ID' => $data['0'],
                    'Negeri' => $data['1'],
                    'Kod_Negeri' => $data['2'],
                    'Negeri_Rkod' => $data['3'],
                    'status_negeri' => $data['4']
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
