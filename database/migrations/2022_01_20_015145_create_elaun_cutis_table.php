<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElaunCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elaun_cutis', function (Blueprint $table) {
            $table->id();
            $table->string('kod_Elaun_Kursus')->nullable();
            $table->string('kod_Kategori_Kursus_Elaun')->nullable();
            $table->string('jenis_Elaun')->nullable();
            $table->text('keterangan_Elaun')->nullable();
            $table->string('amaun_Elaun')->nullable();
            $table->string('Elaun_dikemaskini_oleh')->nullable();
            $table->string('status_Elaun')->nullable();
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
        Schema::dropIfExists('elaun_cutis');
    }
}
