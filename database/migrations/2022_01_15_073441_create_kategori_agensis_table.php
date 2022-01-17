<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriAgensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_agensis', function (Blueprint $table) {
            $table->id();
            $table->string('Kategori_Agensi')->nullable();
            $table->string('Kategori_Agensi_kod')->nullable();
            $table->string('status_kategori_agensi')->nullable();
            $table->string('kategori_agensi_dikemaskini_Oleh')->nullable();
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
        Schema::dropIfExists('kategori_agensis');
    }
}
