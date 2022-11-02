<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStesensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stesens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('U_Negeri_ID')->constrained('negeris');
            $table->foreignId('U_Daerah_ID')->constrained('daerahs');
            $table->foreignId('U_Mukim_ID')->constrained('mukims');
            $table->foreignId('U_Kampung_ID')->constrained('kampungs');
            $table->string('Stesen_kod')->nullable();
            $table->string('Stesen')->nullable();
            $table->string('status_stesen')->nullable();
            $table->string('stesen_dikemaskini_Oleh')->nullable();
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
        Schema::dropIfExists('stesens');
    }
}
