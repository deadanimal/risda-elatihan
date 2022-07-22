<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnRelateToPekebunKecils extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pekebun_kecils', function (Blueprint $table) {
            $table->string('U_Parlimen_ID')->nullable();
            $table->string('Parlimen')->nullable();
            $table->string('U_Dun_ID')->nullable();
            $table->string('Dun')->nullable();
            $table->string('Kod_PT_Lokaliti')->nullable();
            $table->string('Pusat_Tanggungjawab_Lokaliti')->nullable();
        });

        Schema::table('tanahs', function (Blueprint $table) {
            $table->string('Bil_Pemilik_Atas_Geran')->nullable();
            $table->string('U_Pengurusan_Tanah_ID')->nullable();
            $table->string('Pengurusan')->nullable();
            $table->string('U_Taraf_ID')->nullable();
            $table->string('Taraf')->nullable();
            $table->string('Penempatan_id')->nullable();
            $table->string('Penempatan')->nullable();
            $table->string('Kod_PT_Tanah')->nullable();
            $table->string('Pusat_Tanggungjawab_Tanah')->nullable();
        });

        Schema::table('tanamen', function (Blueprint $table) {
            $table->string('U_Lib_Jenis_Tanaman')->nullable();
            $table->string('Tahun_Tanam')->nullable();
            $table->string('U_Agensi_Bantuan_ID')->nullable();
            $table->string('Agensi')->nullable();
            $table->string('U_Pendekatan_ID')->nullable();
            $table->string('Pendekatan')->nullable();
            $table->string('Hasil')->nullable();
            $table->string('U_JProduk_ID')->nullable();
            $table->string('Produk')->nullable();
            $table->string('U_SPengusahan_ID')->nullable();
            $table->string('Status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pekebun_kecils', function (Blueprint $table) {
            $table->dropColumn('U_Parlimen_ID');
            $table->dropColumn('Parlimen');
            $table->dropColumn('U_Dun_ID');
            $table->dropColumn('Dun');
            $table->dropColumn('Kod_PT_Lokaliti');
            $table->dropColumn('Pusat_Tanggungjawab_Lokaliti');
        });

        Schema::table('tanahs', function (Blueprint $table) {
            $table->dropColumn('Bil_Pemilik_Atas_Geran');
            $table->dropColumn('U_Pengurusan_Tanah_ID');
            $table->dropColumn('Pengurusan');
            $table->dropColumn('U_Taraf_ID');
            $table->dropColumn('Taraf');
            $table->dropColumn('Penempatan_id');
            $table->dropColumn('Penempatan');
            $table->dropColumn('Kod_PT_Tanah');
            $table->dropColumn('Pusat_Tanggungjawab_Tanah');
        });

        Schema::table('tanamen', function (Blueprint $table) {
            $table->dropColumn('U_Lib_Jenis_Tanaman');
            $table->dropColumn('Tahun_Tanam');
            $table->dropColumn('U_Agensi_Bantuan_ID');
            $table->dropColumn('Agensi');
            $table->dropColumn('U_Pendekatan_ID');
            $table->dropColumn('Pendekatan');
            $table->dropColumn('Hasil');
            $table->dropColumn('U_JProduk_ID');
            $table->dropColumn('Produk');
            $table->dropColumn('U_SPengusahan_ID');
            $table->dropColumn('Status');
        });
    }
}
