<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelajarPraktikalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelajar_praktikals', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('no_kp')->nullable();
            $table->date('tarikh_lahir')->nullable();
            $table->string('tempat_praktikal')->nullable();
            $table->string('jantina')->nullable();
            $table->string('no_tel')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->nullable();
            $table->string('alamat')->nullable();
            $table->string('alamat2')->nullable();
            $table->string('alamat3')->nullable();
            $table->string('poskod')->nullable();
            $table->string('daerah')->nullable();
            $table->string('negeri')->nullable();
            $table->date('tarikh_mula')->nullable();
            $table->date('tarikh_akhir')->nullable();
            $table->string('status_praktikal')->nullable();
            $table->string('nama_ipt')->nullable();
            $table->string('alamat_ipt')->nullable();
            $table->string('poskod_ipt')->nullable();
            $table->string('daerah_ipt')->nullable();
            $table->string('negeri_ipt')->nullable();
            $table->string('kelayakan_elaun')->nullable();
            $table->string('kelulusan_awal_pembiayaan')->nullable();
            $table->string('tahap_pengajian')->nullable();
            $table->string('bidang')->nullable();

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
        Schema::dropIfExists('pelajar_praktikals');
    }
}
