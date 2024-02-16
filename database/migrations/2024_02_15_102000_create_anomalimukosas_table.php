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
        Schema::create('anomalimukosas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kartupasien_id');
            //anomali
            // $table->foreignId('gigi_id');
            $table->tinyInteger('occlusi');
            $table->tinyInteger('bentuk');
            $table->tinyInteger('warna');
            $table->tinyInteger('posisi');
            $table->tinyInteger('ukuran');
            $table->tinyInteger('struktur');

            //mukosa mulut
            $table->tinyInteger('warna_lidah');
            $table->string('daerah_warna_lidah')->nullable();
            $table->tinyInteger('inflamasi_lidah');
            $table->string('daerah_inflamasi_lidah')->nullable();
            $table->tinyInteger('ulserasi_lidah');
            $table->string('daerah_ulserasi_lidah')->nullable();
            
            $table->tinyInteger('warna_pipi');
            $table->string('daerah_warna_pipi')->nullable();
            $table->tinyInteger('inflamasi_pipi');
            $table->string('daerah_inflamasi_pipi')->nullable();
            $table->tinyInteger('ulserasi_pipi');
            $table->string('daerah_ulserasi_pipi')->nullable();
            
            $table->tinyInteger('warna_palatum');
            $table->string('daerah_warna_palatum')->nullable();
            $table->tinyInteger('inflamasi_palatum');
            $table->string('daerah_inflamasi_palatum')->nullable();
            $table->tinyInteger('ulserasi_palatum');
            $table->string('daerah_ulserasi_palatum')->nullable();
            
            $table->tinyInteger('warna_gingiva');
            $table->string('daerah_warna_gingiva')->nullable();
            $table->tinyInteger('inflamasi_gingiva');
            $table->string('daerah_inflamasi_gingiva')->nullable();
            $table->tinyInteger('ulserasi_gingiva');
            $table->string('daerah_ulserasi_gingiva')->nullable();
            
            $table->tinyInteger('warna_bibir');
            $table->string('daerah_warna_bibir')->nullable();
            $table->tinyInteger('inflamasi_bibir');
            $table->string('daerah_inflamasi_bibir')->nullable();
            $table->tinyInteger('ulserasi_bibir');
            $table->string('daerah_ulserasi_bibir')->nullable();
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
        Schema::dropIfExists('anomalimukosas');
    }
};
