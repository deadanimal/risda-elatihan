<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveForeignToPusatTanggungjawabs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pusat_tanggungjawabs', function (Blueprint $table) {
            $table->dropForeign(['kod_Negeri_PT']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pusat_tanggungjawabs', function (Blueprint $table) {
            //
        });
    }
}
