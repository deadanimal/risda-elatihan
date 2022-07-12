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
        Negeri::create([
            'U_Negeri_ID' => '01',
            'Negeri' => 'JOHOR',
            'Kod_Negeri' => '1',
            'Negeri_Rkod' => '27',
            'status_negeri' => '1'
        ]);

        Negeri::create([
            'U_Negeri_ID' => '02',
            'Negeri' => 'KEDAH',
            'Kod_Negeri' => '2',
            'Negeri_Rkod' => '21',
            'status_negeri' => '1'
        ]);

        Negeri::create([
            'U_Negeri_ID' => '03',
            'Negeri' => 'KELANTAN',
            'Kod_Negeri' => '3',
            'Negeri_Rkod' => '30',
            'status_negeri' => '1'
        ]);

        Negeri::create([
            'U_Negeri_ID' => '04',
            'Negeri' => 'MELAKA',
            'Kod_Negeri' => '4',
            'Negeri_Rkod' => '26',
            'status_negeri' => '1'
        ]);

        Negeri::create([
            'U_Negeri_ID' => '05',
            'Negeri' => 'NEGERI SEMBILAN',
            'Kod_Negeri' => '5',
            'Negeri_Rkod' => '25',
            'status_negeri' => '1'
        ]);

        Negeri::create([
            'U_Negeri_ID' => '06',
            'Negeri' => 'PAHANG',
            'Kod_Negeri' => '6',
            'Negeri_Rkod' => '28',
            'status_negeri' => '1'
        ]);

        Negeri::create([
            'U_Negeri_ID' => '07',
            'Negeri' => 'PULAU PINAN',
            'Kod_Negeri' => '7',
            'Negeri_Rkod' => '22',
            'status_negeri' => '1'
        ]);

        Negeri::create([
            'U_Negeri_ID' => '08',
            'Negeri' => 'PERAK',
            'Kod_Negeri' => '8',
            'Negeri_Rkod' => '23',
            'status_negeri' => '1'
        ]);

        Negeri::create([
            'U_Negeri_ID' => '09',
            'Negeri' => 'PERLIS',
            'Kod_Negeri' => '9',
            'Negeri_Rkod' => '20',
            'status_negeri' => '1'
        ]);

        Negeri::create([
            'U_Negeri_ID' => '10',
            'Negeri' => 'SELANGOR',
            'Kod_Negeri' => '10',
            'Negeri_Rkod' => '24',
            'status_negeri' => '1'
        ]);

        Negeri::create([
            'U_Negeri_ID' => '11',
            'Negeri' => 'TERENGGANU',
            'Kod_Negeri' => '11',
            'Negeri_Rkod' => '29',
            'status_negeri' => '1'
        ]);

        Negeri::create([
            'U_Negeri_ID' => '12',
            'Negeri' => 'SABAH',
            'Kod_Negeri' => '12',
            'Negeri_Rkod' => '50',
            'status_negeri' => '1'
        ]);

        Negeri::create([
            'U_Negeri_ID' => '13',
            'Negeri' => 'SARAWAK',
            'Kod_Negeri' => '13',
            'Negeri_Rkod' => '40',
            'status_negeri' => '1'
        ]);

        Negeri::create([
            'U_Negeri_ID' => '14',
            'Negeri' => 'KUALA LUMPUR',
            'Kod_Negeri' => '14',
            'Negeri_Rkod' => '14',
            'status_negeri' => '1'
        ]);

        Negeri::create([
            'U_Negeri_ID' => '15',
            'Negeri' => 'LABUAN',
            'Kod_Negeri' => '15',
            'Negeri_Rkod' => '15',
            'status_negeri' => '1'
        ]);

        Negeri::create([
            'U_Negeri_ID' => '16',
            'Negeri' => 'PUTRAJAYA',
            'Kod_Negeri' => '16',
            'Negeri_Rkod' => '16',
            'status_negeri' => '1'
        ]);

        Negeri::create([
            'U_Negeri_ID' => '99',
            'Negeri' => 'IBU PEJABAT RISDA',
            'Kod_Negeri' => '99',
            'Negeri_Rkod' => '10',
            'status_negeri' => '1'
        ]);
    }
}
