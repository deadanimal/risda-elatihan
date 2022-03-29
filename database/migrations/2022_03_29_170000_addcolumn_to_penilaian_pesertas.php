<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddcolumnToPenilaianPesertas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penilaian_pesertas', function (Blueprint $table) {
            $table->string('topik_kursus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penilaian_pesertas', function (Blueprint $table) {
            $table->dropColumn('topik_kursus');
        });
    }
}
