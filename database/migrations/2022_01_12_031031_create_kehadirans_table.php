<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKehadiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehadirans', function (Blueprint $table) {
            $table->id();
            $table->string('kod_kursus');
            $table->string('kod_jenis_kursus')->nullable();
            $table->string('kod_kategori')->nullable();
            $table->string('id_pekebun_kecil')->nullable();
            $table->string('no_pekerja')->nullable();
            $table->string('status_kehadiran')->nullable();
            $table->date('tarikh_imbasQR')->nullable();
            $table->time('masa_imbasQR')->nullable();
            $table->string('alasan_ketidakhadiran')->nullable();
            $table->string('nama_pengganti')->nullable();
            $table->string('noKP_pengganti')->nullable();
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
        Schema::dropIfExists('kehadirans');
    }
}
