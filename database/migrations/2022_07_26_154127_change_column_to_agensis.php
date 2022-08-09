<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnToAgensis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agensis', function (Blueprint $table) {
            $table->string('U_Negeri_ID')->nullable()->change();
            $table->string('U_Daerah_ID')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agensis', function (Blueprint $table) {
            $table->bigInteger('U_Negeri_ID')->nullable()->change();
            $table->bigInteger('U_Daerah_ID')->nullable()->change();
        });
    }
}
