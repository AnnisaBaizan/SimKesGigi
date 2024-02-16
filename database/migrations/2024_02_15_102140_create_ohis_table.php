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
        Schema::create('ohis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kartupasien_id');
            $table->tinyInteger('jumlah_gigi');
            $table->tinyInteger('di_1');
            $table->tinyInteger('di_2');
            $table->tinyInteger('di_3');
            $table->tinyInteger('di_4');
            $table->tinyInteger('di_5');
            $table->tinyInteger('di_6');
            $table->string('lokasi_di_1');
            $table->string('lokasi_di_2');
            $table->string('lokasi_di_3');
            $table->string('lokasi_di_4');
            $table->string('lokasi_di_5');
            $table->string('lokasi_di_6');
            $table->string('score_di');
            $table->tinyInteger('ci_1');
            $table->tinyInteger('ci_2');
            $table->tinyInteger('ci_3');
            $table->tinyInteger('ci_4');
            $table->tinyInteger('ci_5');
            $table->tinyInteger('ci_6');
            $table->string('lokasi_ci_1');
            $table->string('lokasi_ci_2');
            $table->string('lokasi_ci_3');
            $table->string('lokasi_ci_4');
            $table->string('lokasi_ci_5');
            $table->string('lokasi_ci_6');
            $table->string('score_ci');
            $table->string('kriteria_ohis');

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
        Schema::dropIfExists('ohis');
    }
};
