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
            $table->foreignId('user_id');
            $table->string('pembimbing');
            $table->foreignId('kartupasien_id');
            //anomali
            // $table->foreignId('gigi_id');
            $table->string('occlusi');
            $table->string('bentuk');
            $table->string('warna');
            $table->string('posisi');
            $table->string('ukuran');
            $table->string('struktur');

            //mukosa mulut
            
            // lidah
            $table->string('w_lidah');
            $table->string('dw_lidah')->nullable();
            $table->string('i_lidah');
            $table->string('di_lidah')->nullable();
            $table->string('u_lidah');
            $table->string('du_lidah')->nullable();
            // pipi
            $table->string('w_pipi');
            $table->string('dw_pipi')->nullable();
            $table->string('i_pipi');
            $table->string('di_pipi')->nullable();
            $table->string('u_pipi');
            $table->string('du_pipi')->nullable();
            // palatum
            $table->string('w_palatum');
            $table->string('dw_palatum')->nullable();
            $table->string('i_palatum');
            $table->string('di_palatum')->nullable();
            $table->string('u_palatum');
            $table->string('du_palatum')->nullable();
            // gingiva
            $table->string('w_gingiva');
            $table->string('dw_gingiva')->nullable();
            $table->string('i_gingiva');
            $table->string('di_gingiva')->nullable();
            $table->string('u_gingiva');
            $table->string('du_gingiva')->nullable();
            // bibir
            $table->string('w_bibir');
            $table->string('dw_bibir')->nullable();
            $table->string('i_bibir');
            $table->string('di_bibir')->nullable();
            $table->string('u_bibir');
            $table->string('du_bibir')->nullable();

            $table->boolean('acc')->default(0);
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
