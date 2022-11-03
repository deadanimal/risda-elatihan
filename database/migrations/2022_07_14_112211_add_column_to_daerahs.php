<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToDaerahs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daerahs', function (Blueprint $table) {
            $table->string('U_Daerah_ID')->nullable();
            $table->integer('Kod_Daerah')->nullable();
            $table->string('Kod_Negeri')->nullable();

            $table->string('U_Negeri_ID')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daerahs', function (Blueprint $table) {
            $table->dropColumn('U_Daerah_ID');
            $table->dropColumn('Kod_Daerah');
            $table->dropColumn('Kod_Negeri');

            $table->bigInteger('U_Negeri_ID')->change();
        });
    }
}
