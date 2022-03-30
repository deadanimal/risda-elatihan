<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGredPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gred_pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('kod_Gred')->nullable();
            $table->string('nama_Gred')->nullable();
            $table->text('keterangan_Gred')->nullable();
            $table->string('Gred_dikemaskini_oleh')->nullable();
            $table->string('status_Gred')->nullable();
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
        Schema::dropIfExists('gred_pegawais');
    }
}
