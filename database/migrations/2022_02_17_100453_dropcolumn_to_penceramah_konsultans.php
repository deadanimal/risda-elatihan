<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropcolumnToPenceramahKonsultans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penceramah_konsultans', function (Blueprint $table) {
            $table->dropColumn('pc_nric');
            $table->dropColumn('pc_nama');
            $table->dropColumn('pc_notelefon');
            $table->string('pc_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penceramah_konsultans', function (Blueprint $table) {
            $table->string('pc_nric')->nullable();
            $table->string('pc_nama')->nullable();
            $table->string('pc_notelefon')->nullable();
            $table->dropColumn('pc_id');
        });
    }
}
