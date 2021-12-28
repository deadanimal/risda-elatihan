<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanah', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_pekebun_kecil')->constrained('pekebun_kecil');
            $table->string('U_Tanah_ID')->nullable();
            $table->string('No_Geran')->nullable();
            $table->string('No_Lot')->nullable();
            $table->string('U_SyaratT_ID')->nullable();
            $table->string('Syarat')->nullable();
            $table->string('U_Negeri_ID')->nullable();
            $table->string('U_Daerah_ID')->nullable();
            $table->string('U_Mukim_ID')->nullable();
            $table->string('U_Seksyen_ID')->nullable();
            $table->string('U_Kampung_ID')->nullable();
            $table->string('U_Parlimen_ID')->nullable();
            $table->string('U_Dun_ID')->nullable();
            $table->string('Luas_Lot')->nullable();
            $table->string('Bahagian_Pemilikan')->nullable();
            $table->string('Luas_Pemilikan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanahs');
    }
}
