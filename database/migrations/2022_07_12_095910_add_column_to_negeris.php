<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToNegeris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('negeris', function (Blueprint $table) {
            $table->integer('Kod_Negeri')->nullable();
            $table->integer('U_Negeri_ID')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('negeris', function (Blueprint $table) {
            $table->dropColumn('Kod_Negeri');
            $table->dropColumn('U_Negeri_ID');
        });
    }
}
