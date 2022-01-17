<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('U_Negeri_ID')->constrained('negeris');
            $table->foreignId('U_Parlimen_ID')->constrained('parlimens');
            $table->string('Dun_kod')->nullable();
            $table->string('Dun')->nullable();
            $table->string('status_dun')->nullable();
            $table->string('dun_dikemaskini_Oleh')->nullable();
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
        Schema::dropIfExists('duns');
    }
}
