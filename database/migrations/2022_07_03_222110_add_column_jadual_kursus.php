<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnJadualKursus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadual_kursuses', function (Blueprint $table) {
            $table->string('masa_mula_penilaian_kursus')->nullable();
            $table->string('masa_tamat_penilaian_kursus')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadual_kursuses', function (Blueprint $table) {
            //
        });
    }
}
