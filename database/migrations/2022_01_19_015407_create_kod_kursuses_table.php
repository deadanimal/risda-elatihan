<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKodKursusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kod_kursuses', function (Blueprint $table) {
            $table->id();
            $table->string('UL_Kod_Kursus')->nullable();
            $table->year('tahun_Kursus')->nullable();
            $table->date('tarikh_daftar_Kursus')->nullable();
            $table->foreignId('U_Bidang_Kursus')->constrained('bidang_kursuses');
            $table->foreignId('U_Kategori_Kursus')->constrained('kategori_kursuses');
            $table->string('kod_Kursus')->nullable();
            $table->string('tajuk_Kursus')->nullable();
            $table->string('Kod_Kursus_dikemaskini_oleh')->nullable();
            $table->string('status_Kod_Kursus')->nullable();
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
        Schema::dropIfExists('kod_kursuses');
    }
}
