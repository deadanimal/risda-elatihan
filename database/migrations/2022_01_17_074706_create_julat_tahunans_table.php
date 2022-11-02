<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJulatTahunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('julat_tahunans', function (Blueprint $table) {
            $table->id();
            $table->string('kod_Julat_tahunan')->nullable();
            $table->string('tahun_Mula')->nullable();
            $table->string('tahun_Tamat')->nullable();
            $table->string('keterangan_Julat_tahunan')->nullable();
            $table->string('julat_tahunan_dikemaskini_oleh')->nullable();
            $table->string('status_julat_tahunan')->nullable();
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
        Schema::dropIfExists('julat_tahunans');
    }
}
