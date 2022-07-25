<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUNegeriIdToStesens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stesens', function (Blueprint $table) {
            $table->string('U_Negeri_ID')->nullable();
            $table->string('U_Daerah_ID')->nullable();
            $table->string('U_Mukim_ID')->nullable();
            $table->string('U_Kampung_ID')->nullable();
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
            $table->dropColumn('U_Negeri_ID');
            $table->dropColumn('U_Daerah_ID');
            $table->dropColumn('U_Mukim_ID');
            $table->dropColumn('U_Kampung_ID');
        });
    }
}
