<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPenilaianEjenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penilaian_ejen_pelaksanas', function (Blueprint $table) {
            $table->string('urusetia_sesuai');
            $table->string('pematuhan_masa');
            $table->string('mudah_dihubungi');
            $table->string('maklumbalas_ejen');
            $table->string('tahap_displin');
            $table->string('prestasi_kerja');
            $table->string('kuantiti_cukup');
            $table->string('kualiti_menepati');
            $table->string('tempoh_dihantar');
            $table->string('patuhi_jadual');
            $table->string('patuhi_skop');
            $table->string('kualiti_perkhidmatan');
            $table->string('ketepatan_masa');
            $table->string('kerjasama_bahagianLatihan');
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
