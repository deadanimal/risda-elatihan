<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerbelanjaanPelajarPraktikalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbelanjaan_pelajar_praktikals', function (Blueprint $table) {
            $table->id();
            $table->string('Thn_Kew')->nullable();
            $table->string('Kod_PT')->nullable();
            $table->string('Kod_PA_ABB')->nullable();
            $table->string('Kod_Objek_ABB')->nullable();
            $table->string('No_DBil')->nullable();
            $table->string('Tkh_DBil')->nullable();
            $table->string('Kod_Pembekal')->nullable();
            $table->string('Perihal')->nullable();
            $table->string('No_Kew10')->nullable();
            $table->string('Amaun_Bayar')->nullable();
            $table->string('Jenis_DBil')->nullable();
            $table->string('Keterangan_DBil')->nullable();
            $table->string('Jenis_Bill')->nullable();
            $table->string('pelajar_praktikal_id')->nullable();
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
        Schema::dropIfExists('perbelanjaan_pelajar_praktikals');
    }
}
