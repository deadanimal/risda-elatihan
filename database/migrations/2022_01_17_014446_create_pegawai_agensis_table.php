<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiAgensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_agensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_agensi')->constrained('agensis');
            $table->string('no_KP_Pegawai')->nullable();
            $table->string('nama_Pegawai')->nullable();
            $table->string('jawatan_Pegawai')->nullable();
            $table->string('emel_Pegawai')->nullable();
            $table->string('telefon_pejabat_Pegawai')->nullable();
            $table->string('sambungan_Pegawai')->nullable();
            $table->string('telefon_bimbit_Pegawai')->nullable();
            $table->string('no_faks_Pegawai')->nullable();
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
        Schema::dropIfExists('pegawai_agensis');
    }
}
