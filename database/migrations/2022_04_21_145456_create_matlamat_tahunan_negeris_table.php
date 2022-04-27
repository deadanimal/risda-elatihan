<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatlamatTahunanNegerisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matlamat_tahunan_negeris', function (Blueprint $table) {
            $table->id();

            $table->string('jenis')->nullable();
            $table->string('nama')->nullable();

            $table->integer('johor')->nullable();
            $table->integer('kedah')->nullable();
            $table->integer('kelantan')->nullable();
            $table->integer('melaka')->nullable();
            $table->integer('negeri_sembilan')->nullable();
            $table->integer('pahang')->nullable();
            $table->integer('perak')->nullable();
            $table->integer('perlis')->nullable();
            $table->integer('pulau_pinang')->nullable();
            $table->integer('selangor')->nullable();
            $table->integer('terengganu')->nullable();
            $table->integer('sarawak')->nullable();
            $table->integer('sabah')->nullable();
            $table->integer('wpkl')->nullable();

            $table->integer('panggilan_ref')->nullable();
            $table->integer('peserta_ref')->nullable();

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
        Schema::dropIfExists('matlamat_tahunan_negeris');
    }
}
