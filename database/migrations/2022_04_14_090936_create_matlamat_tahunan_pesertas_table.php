<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatlamatTahunanPesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matlamat_tahunan_pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('jenis')->nullable();
            $table->string('nama')->nullable();

            $table->integer('jan')->nullable();
            $table->integer('feb')->nullable();
            $table->integer('mac')->nullable();
            $table->integer('apr')->nullable();
            $table->integer('mei')->nullable();
            $table->integer('jun')->nullable();
            $table->integer('jul')->nullable();
            $table->integer('ogos')->nullable();
            $table->integer('sept')->nullable();
            $table->integer('okt')->nullable();
            $table->integer('nov')->nullable();
            $table->integer('dis')->nullable();

            $table->integer('bidang_ref')->nullable();
            $table->integer('kategori_ref')->nullable();
            $table->integer('tajuk_ref')->nullable();

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
        Schema::dropIfExists('matlamat_tahunan_pesertas');
    }
}
