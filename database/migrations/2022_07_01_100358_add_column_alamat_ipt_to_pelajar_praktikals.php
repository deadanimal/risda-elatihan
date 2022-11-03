<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAlamatIptToPelajarPraktikals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelajar_praktikals', function (Blueprint $table) {
            $table->string('alamat_ipt2')->nullable();
            $table->string('alamat_ipt3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelajar_praktikals', function (Blueprint $table) {
            $table->dropColumn('alamat_ipt2');
            $table->dropColumn('alamat_ipt3');
        });
    }
}
