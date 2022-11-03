<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sumbers', function (Blueprint $table) {
            $table->id();
            $table->string('kod_Sumber')->nullable();
            $table->string('nama_Sumber')->nullable();
            $table->string('sumber_dikemaskini_oleh')->nullable();
            $table->string('status_sumber')->nullable();
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
        Schema::dropIfExists('sumbers');
    }
}
