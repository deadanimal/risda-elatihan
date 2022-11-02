<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoKodKursusColumnToKodKursuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kod_kursuses', function (Blueprint $table) {
            $table->string('no_kod_Kursus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kod_kursuses', function (Blueprint $table) {
            $table->dropColumn('no_kod_Kursus');
        });
    }
}
