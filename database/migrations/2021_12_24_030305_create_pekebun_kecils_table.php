<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekebunKecilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekebun_kecil', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_Pengguna')->constrained('users');
            $table->string('Jantina_ID')->nullable();
            $table->string('Jantina')->nullable();
            $table->string('Warganegara_ID')->nullable();
            $table->string('Warganegara')->nullable();
            $table->string('Bangsa_ID')->nullable();
            $table->string('Bangsa')->nullable();
            $table->string('Nombor')->nullable();
            $table->string('Jalan')->nullable();
            $table->string('Nama_Kampung')->nullable();
            $table->string('Bandar')->nullable();
            $table->string('Poskod')->nullable();
            $table->string('U_Negeri_ID')->nullable();
            $table->string('Negeri')->nullable();
            $table->string('U_Daerah_ID')->nullable();
            $table->string('Daerah')->nullable();
            $table->string('U_Mukim_ID')->nullable();
            $table->string('Mukim')->nullable();
            $table->string('U_Kampung_ID')->nullable();
            $table->string('Kampung')->nullable();
            $table->string('U_Seksyen_ID')->nullable();
            $table->string('Seksyen')->nullable();
            $table->string('Penempatan_ID')->nullable();
            $table->string('Penempatan')->nullable();
            $table->string('Telefon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pekebun_kecils');
    }
}
