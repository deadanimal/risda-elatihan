<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToKehadirans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kehadirans', function (Blueprint $table) {
            $table->date('tarikh')->nullable();
            $table->integer('sesi')->nullable();
            $table->string('masa')->nullable();
            $table->foreignId('jadual_kursus_id')->nullable();
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
            $table->dropColumn('tarikh');
            $table->dropColumn('sesi');
            $table->dropColumn('masa');
            $table->dropColumn('jadual_kursus_id');

        });
    }
}
