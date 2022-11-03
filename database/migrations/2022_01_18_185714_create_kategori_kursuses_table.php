<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriKursusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_kursuses', function (Blueprint $table) {
            $table->id();
            $table->string('UL_Kategori_Kursus')->nullable();
            $table->foreignId('U_Bidang_Kursus')->constrained('bidang_kursuses');
            $table->string('jenis_Kategori_Kursus')->nullable();
            $table->string('kod_Kategori_Kursus')->nullable();
            $table->string('nama_Kategori_Kursus')->nullable();
            $table->string('Kategori_Kursus_dikemaskini_oleh')->nullable();
            $table->string('status_Kategori_Kursus')->nullable();
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
        Schema::dropIfExists('kategori_kursuses');
    }
}
