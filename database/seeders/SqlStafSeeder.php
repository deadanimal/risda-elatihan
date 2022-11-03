<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SqlStafSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path('sql/staf-uls-1.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
        
        $path = public_path('sql/staf-uls-2.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);

        $path = public_path('sql/staf-uls-3.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);

        $path = public_path('sql/staf-uls-4.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);

        $path = public_path('sql/staf-uls-5.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);

        $path = public_path('sql/staf-uls-6.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);

        $path = public_path('sql/staf-uls-7.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);

        $path = public_path('sql/staf-uls-8.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);

        $path = public_path('sql/user-roles.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
