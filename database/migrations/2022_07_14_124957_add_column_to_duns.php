<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToDuns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('duns', function (Blueprint $table) {
            $table->string('U_Dun_ID')->nullable();
            $table->string('Kod_Parlimen')->nullable();
            $table->string('Kod_Negeri')->nullable();
            $table->string('Kod_Dun2')->nullable();

            $table->dropForeign(['U_Negeri_ID']);
            $table->dropColumn('U_Negeri_ID');
            $table->dropForeign(['U_Parlimen_ID']);
            $table->dropColumn('U_Parlimen_ID');

            $table->renameColumn('Dun_kod', 'Kod_Dun');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('duns', function (Blueprint $table) {
            $table->dropColumn('U_Dun_ID');
            $table->dropColumn('Kod_Parlimen');
            $table->dropColumn('Kod_Negeri');
            $table->dropColumn('Kod_Dun2');

            $table->string('U_Negeri_ID')->nullable();
            $table->string('U_Parlimen_ID')->nullable();

            $table->renameColumn('Kod_Dun', 'Dun_kod');
        });
    }
}
