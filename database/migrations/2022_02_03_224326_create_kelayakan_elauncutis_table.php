<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelayakanElauncutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelayakan_elauncutis', function (Blueprint $table) {
            $table->id();
            $table->string('kec_jadual_kursus')->nullable();
            $table->string('kec_jenis_elaun')->nullable();
            $table->string('kec_kod_elaun')->nullable();
            $table->string('kec_elaun_kumpulan_sasar')->nullable();
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
        Schema::dropIfExists('kelayakan_elauncutis');
    }
}
