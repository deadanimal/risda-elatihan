<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddcolumnToJawapanMultiplePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jawapan_multiple_post', function (Blueprint $table) {
            $table->string('yang_betul')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jawapan_multiple_post', function (Blueprint $table) {
            $table->dropColumn('yang_betul');
        });
    }
}
