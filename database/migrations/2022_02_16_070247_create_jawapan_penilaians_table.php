<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawapanPenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawapan_penilaians', function (Blueprint $table) {
            $table->id();
            $table->string('kod_soalan_peserta')->nullable();
            $table->string('kod_kategori_soalan')->nullable();
            $table->string('kod_jenis_kursus')->nullable();
            $table->string('kod_kategori')->nullable();
            $table->string('kod_pt')->nullable();
            $table->string('nama_peserta')->nullable();
            $table->string('noKP_peserta')->nullable();
            $table->string('markah1')->nullable();
            $table->string('markah2')->nullable();
            $table->string('markah3')->nullable();
            $table->string('markah4')->nullable();
            $table->string('cadangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawapan_penilaians');
    }
}
