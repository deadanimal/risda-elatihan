<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKampungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kampungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('U_Negeri_ID')->constrained('negeris');
            $table->foreignId('U_Daerah_ID')->constrained('daerahs');
            $table->foreignId('U_Mukim_ID')->constrained('mukims');
            $table->string('Kampung_kod')->nullable();
            $table->string('Kampung')->nullable();
            $table->string('status_kampung')->nullable();
            $table->string('kampung_dikemaskini_Oleh')->nullable();
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
        Schema::dropIfExists('kampungs');
    }
}
