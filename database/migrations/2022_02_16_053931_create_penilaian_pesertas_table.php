<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianPesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('kod_kursus')->nullable();
            $table->string('kod_jenis_kursus')->nullable();
            $table->string('kod_kategori_kursus')->nullable();
            $table->string('kod_pusat_tanggungjawab')->nullable();
            $table->string('id_jadual')->nullable();
            $table->string('id_jawapan')->nullable();
            $table->string('nama_peserta')->nullable();
            $table->string('soalan_penilaian')->nullable();
            $table->string('skala_jawapan')->nullable();
            $table->string('cadangan_kursus')->nullable();
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
        Schema::dropIfExists('penilaian_pesertas');
    }
}
