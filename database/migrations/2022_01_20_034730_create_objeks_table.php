<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objeks', function (Blueprint $table) {
            $table->id();
            $table->string('kod_Objek')->nullable();
            $table->string('nama_Objek')->nullable();
            $table->string('Objek_dikemaskini_oleh')->nullable();
            $table->string('status_Objek')->nullable();
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
        Schema::dropIfExists('objeks');
    }
}
