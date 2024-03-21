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
                        //kondisi dan vitalitas gigi
            // $table->foreignId('gigi_id');
            $table->string('elemen_gigi');
            $table->string('inspeksi');
            $table->string('thermis');
            $table->string('sondasi');
            $table->string('perkusi');
            $table->string('druk');
            $table->string('mobility');
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
