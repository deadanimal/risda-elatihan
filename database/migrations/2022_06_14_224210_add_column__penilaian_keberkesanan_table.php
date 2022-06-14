<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPenilaianKeberkesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penilaian_keberkesanans', function (Blueprint $table) {
            $table->string('tahap_pengetahuan')->nullable();
            $table->string('tempoh_tugasan')->nullable();
            $table->string('baiki_kerja')->nullable();
            $table->string('kesungguhan_kerja')->nullable();
            $table->string('tahap_displin')->nullable();
            $table->string('prestasi_kerja')->nullable();
            $table->string('komen_penyelia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penilaian_keberkesanans', function (Blueprint $table) {
            //
        });
    }
}
