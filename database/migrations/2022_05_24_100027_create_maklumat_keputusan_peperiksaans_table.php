<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaklumatKeputusanPeperiksaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maklumat_keputusan_peperiksaans', function (Blueprint $table) {
            $table->id();
            $table->string('id_pengajian_lanjutan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('semester')->nullable();
            $table->string('gpa')->nullable();
            $table->string('cgpa')->nullable();
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
        Schema::dropIfExists('maklumat_keputusan_peperiksaans');
    }
}
