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
        Schema::create('eksplakkals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kartupasien_id');
            
            //eksternal
            $table->tinyInteger('muka');
            $table->tinyInteger('limpe_kanan_teraba');
            $table->tinyInteger('limpe_kanan_texture');
            $table->tinyInteger('limpe_kanan_sakit');
            $table->tinyInteger('limpe_kiri_teraba');
            $table->tinyInteger('limpe_kiri_texture');
            $table->tinyInteger('limpe_kiri_sakit');

            //pengukuran plak
            $table->string('gigi_yang_dipilih');
            $table->tinyInteger('jumlah_permukaan');
            $table->tinyInteger('jumlah_tidak_plak');
            $table->string('plaque_score');
            $table->string('kriteria');

            //kalkulus
            $table->string('gigi_supragingiva');
            $table->string('gigi_subgingiva');

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
        Schema::dropIfExists('eksplakkals');
    }
};
