<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToSeksyens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seksyens', function (Blueprint $table) {
            $table->string('U_Seksyen_ID')->nullable();
            $table->string('kod_daerah')->nullable();
            $table->string('kod_negeri')->nullable();
            $table->string('kod_mukim')->nullable();

            $table->dropForeign(['U_Negeri_ID']);
            $table->dropColumn('U_Negeri_ID');
            $table->dropForeign(['U_Daerah_ID']);
            $table->dropColumn('U_Daerah_ID');
            $table->dropForeign(['U_Mukim_ID']);
            $table->dropColumn('U_Mukim_ID');

            $table->renameColumn('Seksyen_kod', 'kod_seksyen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seksyens', function (Blueprint $table) {
            $table->dropColumn('U_Seksyen_ID');
            $table->dropColumn('kod_daerah');
            $table->dropColumn('kod_negeri');
            $table->dropColumn('kod_mukim');

            $table->renameColumn('kod_Seksyen', 'seksyen_kod');
        });
    }
}
