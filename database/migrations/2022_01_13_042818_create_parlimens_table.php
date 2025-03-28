<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParlimensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parlimens', function (Blueprint $table) {
            $table->id();
            $table->string('U_Negeri_ID')->nullable();
            $table->string('Parlimen_kod')->nullable();
            $table->string('Parlimen')->nullable();
            $table->string('status_parlimen')->nullable();
            $table->string('parlimen_dikemaskini_Oleh')->nullable();
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
        Schema::dropIfExists('parlimens');
    }
}
