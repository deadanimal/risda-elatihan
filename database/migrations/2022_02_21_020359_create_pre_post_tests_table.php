<?php

use App\Models\JadualKursus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrePostTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_post_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(JadualKursus::class);
            $table->string('jenis_soalan')->nullable();
            $table->string('soalan')->nullable();
            $table->string('status')->nullable();
            $table->string('jawapan')->nullable();
            $table->timestamps();
        });
        Schema::create('jawapan_multiple', function (Blueprint $table) {
            $table->id();
            $table->string('soalan_id')->nullable();
            $table->string('jawapan')->nullable();
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
        Schema::dropIfExists('pre_post_tests');
        Schema::dropIfExists('jawapan_multiple');
    }
}
