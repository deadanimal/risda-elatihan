<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnNameToPerbelanjaanPengajianLanjutans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perbelanjaan_pengajian_lanjutans', function (Blueprint $table) {
            $table->renameColumn('Kod_PA_ABB', 'Kod_PA');
            $table->renameColumn('Kod_Objek_ABB', 'Kod_Objek');
            $table->renameColumn('Amaun_Bayar', 'Amaun');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perbelanjaan_pengajian_lanjutans', function (Blueprint $table) {
            $table->renameColumn('Kod_PA', 'Kod_PA_ABB');
            $table->renameColumn('Kod_Objek', 'Kod_Objek_ABB');
            $table->renameColumn('Amaun', 'Amaun_Bayar');
        });
    }
}
