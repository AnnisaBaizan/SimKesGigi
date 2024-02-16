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
            $table->tinyInteger('jawaban_benar_peng');
            $table->tinyInteger('jumlah_pertanyaan_peng');
            $table->tinyInteger('nilai_peng');
            $table->string('kriteria');

            //keterampilan
            $table->tinyInteger('labialbukal');
            $table->tinyInteger('lingualpalatal');
            $table->tinyInteger('kunyah');
            $table->tinyInteger('interdental');
            $table->tinyInteger('gerakan');
            $table->string('kesimpulan');

            //perilaku
            $table->string('perilaku');
            $table->tinyInteger('jumlah_yang_terpilih');
            $table->tinyInteger('jumlah_pilihan');
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
