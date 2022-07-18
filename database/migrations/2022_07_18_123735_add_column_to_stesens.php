<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToStesens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stesens', function (Blueprint $table) {
            $table->string('keterangan')->nullable();
            $table->string('Kod_PT')->nullable();

            $table->dropForeign(['U_Negeri_ID']);
            $table->dropColumn('U_Negeri_ID');
            $table->dropForeign(['U_Daerah_ID']);
            $table->dropColumn('U_Daerah_ID');
            $table->dropForeign(['U_Mukim_ID']);
            $table->dropColumn('U_Mukim_ID');
            $table->dropForeign(['U_Kampung_ID']);
            $table->dropColumn('U_Kampung_ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stesens', function (Blueprint $table) {
            $table->dropColumn('keterangan');
            $table->dropColumn('Kod_PT');
        });
    }
}
