<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidangKursusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidang_kursuses', function (Blueprint $table) {
            $table->id();
            $table->string('UL_Bidang_Kursus')->nullable();
            $table->string('kod_Bidang_Kursus')->nullable();
            $table->string('nama_Bidang_Kursus')->nullable();
            $table->string('Bidang_Kursus_dikemaskini_oleh')->nullable();
            $table->string('status_Bidang_Kursus')->nullable();
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
        Schema::dropIfExists('bidang_kursuses');
    }
}
