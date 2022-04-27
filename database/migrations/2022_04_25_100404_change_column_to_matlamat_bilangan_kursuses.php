<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnToMatlamatBilanganKursuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matlamat_bilangan_kursuses', function (Blueprint $table) {
            $table->dropColumn('kategori');
            $table->dropColumn('tajuk');
            $table->dropColumn('pusat_latihan');

            $table->renameColumn('bidang', 'nama');

            $table->integer('bidang_ref')->nullable();
            $table->integer('kategori_ref')->nullable();
            $table->integer('tajuk_ref')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matlamat_bilangan_kursuses', function (Blueprint $table) {
            $table->string('kategori')->nullable();
            $table->string('tajuk')->nullable();
            $table->string('pusat_latihan')->nullable();

            $table->renameColumn('nama', 'bidang');

            $table->dropColumn('bidang_ref');
            $table->dropColumn('kategori_ref');
            $table->dropColumn('tajuk_ref');
        });
    }
}
