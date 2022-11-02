<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerbelanjaanYuransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbelanjaan_yurans', function (Blueprint $table) {
            $table->id();
            $table->string('id_pengajian_lanjutan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('semester')->nullable();
            $table->string('perbelanjaan')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('no_rujukan')->nullable();
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('perbelanjaan_yurans');
    }
}
