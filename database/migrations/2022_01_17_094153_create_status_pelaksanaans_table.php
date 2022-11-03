<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPelaksanaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_pelaksanaans', function (Blueprint $table) {
            $table->id();
            $table->string('kod_Status_Pelaksanaan')->nullable();
            $table->string('Status_Pelaksanaan')->nullable();
            $table->string('status_pelaksanaan_dikemaskini_oleh')->nullable();
            $table->string('status_status_pelaksanaan')->nullable();
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
        Schema::dropIfExists('status_pelaksanaans');
    }
}
