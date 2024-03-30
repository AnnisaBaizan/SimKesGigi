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
        Schema::create('vitalitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('pembimbing');
            $table->foreignId('kartupasien_id');
            $table->string('elemen_gigi');
            $table->tinyInteger('inspeksi');
            $table->tinyInteger('thermis');
            $table->tinyInteger('sondasi');
            $table->tinyInteger('perkusi');
            $table->tinyInteger('druk');
            $table->tinyInteger('mobility');
            $table->string('masalah');
            

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
        Schema::dropIfExists('vitalitas');
    }
};
