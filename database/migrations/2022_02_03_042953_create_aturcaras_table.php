<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAturcarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aturcaras', function (Blueprint $table) {
            $table->id();
            $table->string('ac_jadual_kursus')->nullable();
            $table->string('ac_hari')->nullable();
            $table->string('ac_sesi')->nullable();
            $table->string('ac_masa')->nullable();
            $table->text('ac_aturcara')->nullable();
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
        Schema::dropIfExists('aturcaras');
    }
}
