<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenceramahKonsultansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penceramah_konsultans', function (Blueprint $table) {
            $table->id();
            $table->string('pc_jadual_kursus')->nullable();
            $table->string('pc_nric')->nullable();
            $table->string('pc_nama')->nullable();
            $table->string('pc_notelefon')->nullable();
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
        Schema::dropIfExists('penceramah_konsultans');
    }
}
