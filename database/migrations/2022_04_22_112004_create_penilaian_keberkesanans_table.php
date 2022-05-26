<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\JadualKursus;
use App\Models\Kehadiran;


class CreatePenilaianKeberkesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_keberkesanans', function (Blueprint $table) {
            $table->id();
            $table->string('id_Pengguna')->constrained('users');
            $table->string('tahap_pengetahuan')->nullable();
            $table->string('tempoh_tugasan')->nullable();
            $table->string('baiki_kerja')->nullable();
            $table->string('kesungguhan_kerja')->nullable();
            $table->string('tahap_displin')->nullable();
            $table->string('prestasi_kerja')->nullable();
            $table->string('komen_penyelia')->nullable();


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
        Schema::dropIfExists('penilaian_keberkesanans');
    }
}
