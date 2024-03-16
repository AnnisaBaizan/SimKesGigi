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
            $table->foreignId('user_id');
            $table->string('pembimbing');
            $table->foreignId('kartupasien_id');
            $table->tinyInteger('di_1')->nullable();
            $table->tinyInteger('di_2')->nullable();
            $table->tinyInteger('di_3')->nullable();
            $table->tinyInteger('di_4')->nullable();
            $table->tinyInteger('di_5')->nullable();
            $table->tinyInteger('di_6')->nullable();
            $table->tinyInteger('jumlah_nilai_di');
            $table->tinyInteger('jumlah_gigi_di');
            $table->string('score_di');
            $table->tinyInteger('ci_1')->nullable();
            $table->tinyInteger('ci_2')->nullable();
            $table->tinyInteger('ci_3')->nullable();
            $table->tinyInteger('ci_4')->nullable();
            $table->tinyInteger('ci_5')->nullable();
            $table->tinyInteger('ci_6')->nullable();
            $table->tinyInteger('jumlah_nilai_ci');
            $table->tinyInteger('jumlah_gigi_ci');
            $table->string('score_ci');
            $table->string('nilai_kriteria_ohis');
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
