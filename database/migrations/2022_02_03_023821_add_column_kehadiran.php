<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnKehadiran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kehadirans', function (Blueprint $table) {
            $table->string('jadual_kursus_ref')->nullable();
            $table->string('status_kehadiran_ke_kursus')->nullable();
            $table->string('alasan_ketidakhadiran_ke_kursus')->nullable();
            $table->string('pengesahan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kehadirans', function (Blueprint $table) {
            $table->dropColumn('adual_kursus_ref');
            $table->dropColumn('status_kehadiran_ke_kursus');
            $table->dropColumn('alasan_ketidakhadiran_ke_kursus');
        });
    }
}
