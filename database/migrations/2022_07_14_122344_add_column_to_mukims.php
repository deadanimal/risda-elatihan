<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToMukims extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mukims', function (Blueprint $table) {
            $table->string('U_Mukim_ID')->nullable();
            $table->integer('Kod_Mukim')->nullable();
            $table->integer('Kod_Negeri')->nullable();
            $table->integer('Kod_Daerah')->nullable();
            $table->integer('Stesen_Kod')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mukims', function (Blueprint $table) {
            $table->dropColumn('U_Mukim_ID');
            $table->dropColumn('Kod_Mukim');
            $table->dropColumn('Kod_Negeri');
            $table->dropColumn('Kod_Daerah');
            $table->dropColumn('Stesen_Kod');
        });
    }
}
