<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\JadualKursus;
use App\Models\Agensi;

class CreateKehadiranPusatLatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehadiran_pusat_latihans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Agensi::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(JadualKursus::class);
            $table->string('pengesahan_kehadiran_pl')->nullable();
            $table->string('status_kehadiran')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kehadiran_pusat_latihans');
    }
}
