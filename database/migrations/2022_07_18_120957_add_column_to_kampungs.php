<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToKampungs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kampungs', function (Blueprint $table) {
            $table->string('U_Kampung_ID')->nullable();
            $table->string('Kod_Daerah')->nullable();
            $table->string('Kod_Negeri')->nullable();
            $table->string('Kod_Mukim')->nullable();

            $table->renameColumn('Kampung_kod', 'Kod_Kampung');
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
            $table->dropColumn('U_Kampung_ID');
            $table->dropColumn('Kod_Daerah');
            $table->dropColumn('Kod_Negeri');
            $table->dropColumn('Kod_Mukim');

            $table->renameColumn('Kod_Kampung', 'Kampung_kod');
        });
    }
}
