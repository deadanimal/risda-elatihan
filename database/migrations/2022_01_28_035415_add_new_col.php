<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewCol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadual_kursuses', function (Blueprint $table) {
            $table->string('kursus_alamat_tempat')->nullable();
        });

        Schema::table('kod_kursuses', function (Blueprint $table) {
            $table->string('tempat_khusus')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
