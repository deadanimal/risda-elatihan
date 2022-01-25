<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToKodKhusus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kod_kursuses', function (Blueprint $table) {
            $table->string('tempat_khusus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kod_kursuses', function (Blueprint $table) {
            $table->dropColumn('tempat_khusus');
        });
    }
}
