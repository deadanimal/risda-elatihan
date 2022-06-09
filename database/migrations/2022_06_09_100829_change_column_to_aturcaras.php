<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnToAturcaras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aturcaras', function (Blueprint $table) {
            $table->renameColumn('ac_masa', 'ac_masa_mula');
            $table->string('ac_masa_tamat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aturcaras', function (Blueprint $table) {
            $table->renameColumn('ac_masa_mula', 'ac_masa');
            $table->dropColumn('ac_masa_tamat')->nullable();
        });
    }
}
