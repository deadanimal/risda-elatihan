<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToJadualKursuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadual_kursuses', function (Blueprint $table) {
            $table->string('kursus_unit_latihan')->nullable();
            $table->string('kursus_status')->nullable();
            $table->string('kursus_tarikh_daftar')->nullable();
            $table->string('kursus_bidang')->nullable();
            $table->string('kursus_tajuk')->nullable();
            $table->string('kursus_nama')->nullable();
            $table->string('kursus_kod_nama_kursus')->nullable();
            $table->string('kursus_status_pelaksanaan')->nullable();
            $table->string('kursus_masa_pendaftaran')->nullable();
            $table->string('kursus_tarikh_tutup')->nullable();
            $table->string('kursus_hrmis')->nullable();
            $table->string('kursus_julat_umur1')->nullable();
            $table->string('kursus_julat_umur2')->nullable();
            $table->string('kursus_kumpulan_sasaran')->nullable();
            $table->string('kursus_pengendali_latihan')->nullable();
            $table->text('kursus_catatan')->nullable();
            $table->string('kursus_tempat')->nullable();
            $table->string('kursus_objektif')->nullable();
            $table->string('kursus_silibus')->nullable();
            $table->string('kursus_metodologi')->nullable();
            $table->string('kursus_nota_rujukan')->nullable();
            $table->string('kursus_no_ft')->nullable();
            $table->string('kursus_staf_yang_bertanggungjawab')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadual_kursuses', function (Blueprint $table) {
            //
        });
    }
}
