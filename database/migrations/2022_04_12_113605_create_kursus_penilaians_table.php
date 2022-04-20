<?php
use App\Models\JadualKursus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKursusPenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kursus_penilaians', function (Blueprint $table) {

            $table->id();
            $table->foreignIdFor(JadualKursus::class);
            $table->string('nama_peserta')->nullable();
            $table->string('bahagian')->nullable();
            $table->string('kategori_soalan')->nullable();
            $table->string('kategori_jawapan')->nullable();
            $table->string('soalan')->nullable();
            $table->string('jawapan')->nullable();
            $table->string('status_soalan')->nullable();
            $table->string('pp_isi_kursus')->nullable();
            $table->string('pp_komen_isi')->nullable();
            $table->string('pp_kandungan_kursus')->nullable();
            $table->string('pp_komen_kandungan')->nullable();
            $table->string('pp_kandungan_aktiviti')->nullable();
            $table->string('pp_komen_kandungan_aktiviti')->nullable();
            $table->string('pp_ulasan_kandungan_aktiviti')->nullable();
            $table->string('pc_penyampaian')->nullable();
            $table->string('pc_komen_penyampaian')->nullable();
            $table->string('pc_interaksi_peserta')->nullable();
            $table->string('pc_komen_interaksi')->nullable();
            $table->string('pc_aktiviti')->nullable();
            $table->string('pc_komen_aktiviti')->nullable();
            $table->string('pc_ulasan_aktiviti')->nullable();
            $table->string('fp_penginapan')->nullable();
            $table->string('fp_komen_penginapan')->nullable();
            $table->string('fp_makan')->nullable();
            $table->string('fp_komen_makan')->nullable();
            $table->string('fp_dewan')->nullable();
            $table->string('fp_komen_dewan')->nullable();
            $table->string('fp_ulasan_dewan')->nullable();

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
        Schema::dropIfExists('kursus_penilaians');
    }
}
