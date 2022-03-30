<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditTableJawapanPenilaian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jawapan_penilaians', function (Blueprint $table) {
            $table->dropColumn('kod_soalan_peserta');
            $table->dropColumn('kod_kategori_soalan');
            $table->dropColumn('kod_jenis_kursus');
            $table->dropColumn('kod_kategori');
            $table->dropColumn('kod_pt');
            $table->dropColumn('nama_peserta');
            $table->dropColumn('noKP_peserta');
            $table->dropColumn('markah2');
            $table->dropColumn('markah1');
            $table->dropColumn('markah3');
            $table->dropColumn('markah4');
            $table->dropColumn('cadangan');

            $table->string('jadual_kursus_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('markah')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jawapan_penilaians', function (Blueprint $table) {
            //
        });
    }
}
