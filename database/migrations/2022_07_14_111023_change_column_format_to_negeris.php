<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnFormatToNegeris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('negeris', function (Blueprint $table) {
            $table->string('Kod_Negeri')->nullable()->change();
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
        Schema::table('negeris', function (Blueprint $table) {
            $table->integer('Kod_Negeri')->nullable()->change();
            $table->integer('U_Negeri_ID')->nullable()->change();
        });
    }
}
