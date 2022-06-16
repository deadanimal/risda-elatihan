<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerbelanjaanKursusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbelanjaan_kursuses', function (Blueprint $table) {
            $table->id();
            $table->string('Thn_Kew')->nullable();
            $table->string('Kod_PT')->nullable();
            $table->string('Kod_PA')->nullable();
            $table->string('Kod_Obj')->nullable();
            $table->string('No_Pesanan')->nullable();
            $table->string('Tkh_Pesanan')->nullable();
            $table->string('Kod_Pembekal')->nullable();
            $table->string('Tujuan')->nullable();
            $table->string('Rujukan')->nullable();
            $table->string('Jum_LO')->nullable();
            $table->string('jadualkursus_id')->nullable();
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
        Schema::dropIfExists('perbelanjaan_kursuses');
    }
}
