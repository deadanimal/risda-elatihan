<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeruntukanPesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peruntukan_pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('pp_jadual_kursus')->nullable();
            $table->string('pp_negeri')->nullable();
            $table->string('pp_pusat_tanggungjawab')->nullable();
            $table->string('pp_peruntukan_calon')->nullable();
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
        Schema::dropIfExists('peruntukan_pesertas');
    }
}
