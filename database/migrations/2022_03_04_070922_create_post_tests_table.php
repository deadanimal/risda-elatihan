<?php

use App\Models\JadualKursus;
use App\Models\PostTest;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(JadualKursus::class);
            $table->string('jenis_soalan')->nullable();
            $table->string('soalan')->nullable();
            $table->string('status')->nullable();
            $table->string('jawapan')->nullable();
            $table->string('yang_betul')->nullable();
            $table->timestamps();
        });

        Schema::create('jawapan_multiple_post', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PostTest::class);
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
        Schema::dropIfExists('post_tests');
        Schema::dropIfExists('jawapan_multiple_post');

    }
}
