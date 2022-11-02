<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencalonanPesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencalonan_pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('peserta')->nullable();
            $table->string('jadual')->nullable();
            $table->string('status')->nullable();
            $table->string('dicalon_oleh')->nullable();
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
        Schema::dropIfExists('pencalonan_pesertas');
    }
}
