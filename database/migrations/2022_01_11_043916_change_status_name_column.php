<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStatusNameColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('negeris', function (Blueprint $table) {
            $table->renameColumn('status', 'status_negeri');
        });

        Schema::table('daerahs', function (Blueprint $table) {
            $table->renameColumn('status', 'status_daerah');
        });

        Schema::table('mukims', function (Blueprint $table) {
            $table->renameColumn('status', 'status_mukim');
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
