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
            $table->foreignId('user_id');
            $table->string('pembimbing');
            $table->foreignId('kartupasien_id');
            
            //eksternal
            $table->string('muka');
            $table->string('limpe_kanan_teraba');
            $table->string('limpe_kanan_texture');
            $table->string('limpe_kanan_sakit');
            $table->string('limpe_kiri_teraba');
            $table->string('limpe_kiri_texture');
            $table->string('limpe_kiri_sakit');

            //pengukuran plak
            $table->string('plak');
            $table->tinyInteger('jumlah_plak');
            $table->tinyInteger('jumlah_permukaan');
            $table->tinyInteger('jumlah_tidak_plak');
            $table->string('plaque_score');
            $table->string('kriteria');

            //kalkulus
            $table->string('supragingiva');
            $table->string('subgingiva');

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
