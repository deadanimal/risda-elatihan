<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeksyensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seksyens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('U_Negeri_ID')->constrained('negeris');
            $table->foreignId('U_Daerah_ID')->constrained('daerahs');
            $table->foreignId('U_Mukim_ID')->constrained('mukims');
            $table->string('Seksyen_kod')->nullable();
            $table->string('Seksyen')->nullable();
            $table->string('Kampung')->nullable();
            $table->string('status_seksyen')->nullable();
            $table->string('seksyen_dikemaskini_Oleh')->nullable();
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
        Schema::dropIfExists('seksyens');
    }
}
