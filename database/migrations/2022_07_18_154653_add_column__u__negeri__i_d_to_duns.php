<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUNegeriIDToDuns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('duns', function (Blueprint $table) {
            $table->string('U_Negeri_ID')->nullable();
            $table->string('U_Parlimen_ID')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('duns', function (Blueprint $table) {
            $table->dropColumn('U_Negeri_ID');
            $table->dropColumn('U_Parlimen_ID');
        });
    }
}
