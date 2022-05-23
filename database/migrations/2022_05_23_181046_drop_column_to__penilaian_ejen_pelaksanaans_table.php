<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnToPenilaianEjenPelaksanaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penilaian_ejen_pelaksanas', function (Blueprint $table) {
            $table->string('agensi_id')->nullable()->change();
            $table->string('jadual_kursus_id')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penilaian_ejen_pelaksanas', function (Blueprint $table) {
            //
        });
    }
}
