<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddcolumnmasaToJadualKursuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadual_kursuses', function (Blueprint $table) {
            $table->string('kursus_masa_mula_pre_post_test')->nullable();
            $table->string('kursus_masa_tamat_pre_post_test')->nullable();
            $table->string('kursus_masa_mula_post_test')->nullable();
            $table->string('kursus_masa_tamat_post_test')->nullable();
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
            $table->dropColumn('kursus_masa_mula_pre_post_test');
            $table->dropColumn('kursus_masa_tamat_pre_post_test');
            $table->dropColumn('kursus_masa_mula_post_test');
            $table->dropColumn('kursus_masa_tamat_post_test');
        });
    }
}
