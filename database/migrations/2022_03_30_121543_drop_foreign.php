<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agensis', function (Blueprint $table) {
            $table->dropForeign('agensis_u_negeri_id_foreign');
            $table->dropForeign('agensis_u_daerah_id_foreign');
            $table->dropForeign('agensis_kategori_agensi_foreign');
        });

        Schema::table('kampungs', function (Blueprint $table) {
            $table->dropForeign('kampungs_u_negeri_id_foreign');
            $table->dropForeign('kampungs_u_mukim_id_foreign');
            $table->dropForeign('kampungs_u_daerah_id_foreign');
        });

        Schema::table('mukims', function (Blueprint $table) {
            $table->dropForeign('mukims_u_negeri_id_foreign');
            $table->dropForeign('mukims_u_daerah_id_foreign');
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
