<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGAPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('g_a_p_s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('id_tanaman')->nullable();
            $table->string('U_JnsAmalan_ID')->nullable();
            $table->string('Amalan')->nullable();
            $table->string('U_Tahap_ID')->nullable();
            $table->string('Tahap')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('g_a_p_s');
    }
}
