<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStafsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stafs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_Pengguna')->constrained('users');
            $table->string('nopekerja')->nullable();
            $table->string('GelaranJwtn')->nullable();
            $table->string('Gred')->nullable();
            $table->string('Jawatan')->nullable();
            $table->string('Kod_PT')->nullable();
            $table->string('Negeri')->nullable();
            $table->string('NamaPA')->nullable();
            $table->string('NamaUNit')->nullable();
            $table->string('StesenBertugas')->nullable();
            $table->string('notel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stafs');
    }
}
