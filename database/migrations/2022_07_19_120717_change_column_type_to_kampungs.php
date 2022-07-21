<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnTypeToKampungs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kampungs', function (Blueprint $table) {
            $table->string('U_Negeri_ID')->nullable()->change();
            $table->string('U_Daerah_ID')->nullable()->change();
            $table->string('U_Mukim_ID')->nullable()->change();
            $table->integer('Kod_Daerah')->change();
            $table->integer('Kod_Negeri')->change();
            $table->integer('Kod_Mukim')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kampungs', function (Blueprint $table) {
            $table->integer('U_Negeri_ID')->nullable()->change();
            $table->integer('U_Daerah_ID')->nullable()->change();
            $table->integer('U_Mukim_ID')->nullable()->change();
            $table->string('Kod_Daerah')->change();
            $table->string('Kod_Negeri')->change();
            $table->string('Kod_Mukim')->change();
        });
    }
}
