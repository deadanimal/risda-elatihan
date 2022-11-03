<?php

use App\Models\Kehadiran;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToPenilaianKeberkesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penilaian_keberkesanans', function (Blueprint $table) {

            $table->foreignIdFor(Kehadiran::class);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penilaian_keberkesanans', function (Blueprint $table) {
            //
        });
    }
}
