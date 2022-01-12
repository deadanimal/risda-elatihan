<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMukimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mukims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('U_Negeri_ID')->constrained('negeris');
            $table->foreignId('U_Daerah_ID')->constrained('daerahs');
            $table->string('Mukim_Rkod')->nullable();
            $table->string('Mukim')->nullable();
            $table->string('status')->nullable();
            $table->string('dikemaskini_Oleh')->nullable();
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
        Schema::dropIfExists('mukims');
    }
}
