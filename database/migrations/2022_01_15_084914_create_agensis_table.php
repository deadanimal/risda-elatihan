<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_agensi')->constrained('kategori_agensis');
            $table->string('no_KP_Agensi')->nullable();
            $table->string('nama_Agensi')->nullable();
            $table->string('alamat_Agensi_baris1')->nullable();
            $table->string('alamat_Agensi_baris2')->nullable();
            $table->string('alamat_Agensi_baris3')->nullable();
            $table->string('poskod')->nullable();
            $table->string('no_Telefon_Agensi')->nullable();
            $table->string('no_Faks_Agensi')->nullable();
            $table->string('website_Agensi')->nullable();
            $table->string('agensi_dikemaskini_oleh')->nullable();
            $table->foreignId('U_Negeri_ID')->constrained('negeris');
            $table->foreignId('U_Daerah_ID')->constrained('daerahs');
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
        Schema::dropIfExists('agensis');
    }
}
