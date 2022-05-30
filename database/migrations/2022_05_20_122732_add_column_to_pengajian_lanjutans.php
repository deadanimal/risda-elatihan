<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToPengajianLanjutans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengajian_lanjutans', function (Blueprint $table) {
            $table->string('unit_latihan')->nullable();
            $table->string('pusat_tanggungjawab')->nullable();
            $table->string('staf')->nullable();
            $table->string('kategori_pengajian_lanjutan')->nullable();
            $table->string('kemudahan')->nullable();
            $table->string('anjuran')->nullable();
            $table->text('alamat_penganjur')->nullable();
            $table->string('bidang_pengajian')->nullable();
            $table->string('tarikh_mula_pengajian')->nullable();
            $table->string('tarikh_tamat_pengajian')->nullable();
            $table->string('status_pengajian_lanjutan')->nullable();
            $table->string('no_ftcb')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengajian_lanjutans', function (Blueprint $table) {
            //
        });
    }
}
