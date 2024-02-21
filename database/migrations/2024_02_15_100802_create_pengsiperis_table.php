<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengsiperis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kartupasien_id');
            //pengetahuan
            $table->string('pengetahuan');
            $table->tinyInteger('jumlah_pertanyaan_peng');
            $table->tinyInteger('jawaban_benar_peng');
            $table->tinyInteger('nilai_peng');
            $table->string('kriteria');

            //keterampilan
            $table->tinyInteger('labialbukal');
            $table->string('hasil_lb');
            $table->tinyInteger('lingualpalatal');
            $table->string('hasil_lp');
            $table->tinyInteger('kunyah');
            $table->string('hasil_k');
            $table->tinyInteger('interdental');
            $table->string('hasil_i');
            $table->tinyInteger('gerakan');
            $table->string('hasil_g');
            $table->string('kesimpulan');

            //perilaku
            $table->string('perilaku');
            $table->tinyInteger('jumlah_pilihan');
            $table->tinyInteger('jumlah_yang_terpilih');
            $table->tinyInteger('nilai_peri');
            $table->string('berperilaku');

            //peran orang tua
            $table->string('peran_ortu');

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
        Schema::dropIfExists('pengsiperis');
    }
};
