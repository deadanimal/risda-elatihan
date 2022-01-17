<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePusatTanggungjawabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pusat_tanggungjawabs', function (Blueprint $table) {
            $table->id();
            $table->string('kod_PT')->nullable();
            $table->string('nama_PT')->nullable();
            $table->string('alamat_PT_baris1')->nullable();
            $table->string('alamat_PT_baris2')->nullable();
            $table->string('alamat_PT_baris3')->nullable();
            $table->string('alamat_PT_baris4')->nullable();
            $table->string('no_Telefon_PT')->nullable();
            $table->string('no_Faks_PT')->nullable();
            $table->foreignId('kod_Negeri_PT')->constrained('negeris');
            $table->text('keterangan_PT')->nullable();
            $table->string('status_PT')->nullable();
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
        Schema::dropIfExists('pusat_tanggungjawabs');
    }
}
