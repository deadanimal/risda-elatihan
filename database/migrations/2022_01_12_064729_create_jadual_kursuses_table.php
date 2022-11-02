<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadualKursusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadual_kursuses', function (Blueprint $table) {
            $table->id();
            $table->string('kod_agensi')->nullable();
            $table->string('kod_jenis_kursus')->nullable();
            $table->string('kod_kategori')->nullable();
            $table->string('kod_kursus')->nullable();
            $table->string('tahun')->nullable();
            $table->date('tarikh_mula')->nullable();
            $table->date('tarikh_tamat')->nullable();
            $table->string('peruntukan_mengurus')->nullable();
            $table->string('peruntukan_pembangunan')->nullable();
            $table->string('peruntukan_sumber')->nullable();
            $table->string('bilangan_hari')->nullable();
            $table->string('id_siri')->nullable();
            $table->string('nota_rujukan')->nullable();
            $table->string('sijil_kursus')->nullable();
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
        Schema::dropIfExists('jadual_kursuses');
    }
}
