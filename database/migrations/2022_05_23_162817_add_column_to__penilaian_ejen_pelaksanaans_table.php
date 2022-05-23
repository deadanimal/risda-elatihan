<?php

use App\Models\PenceramahKonsultan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToPenilaianEjenPelaksanaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penilaian_ejen_pelaksanas', function (Blueprint $table) {
            $table->foreignIdFor(PenceramahKonsultan::class);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penilaian_ejen_pelaksanas', function (Blueprint $table) {
            

        });
    }
}
