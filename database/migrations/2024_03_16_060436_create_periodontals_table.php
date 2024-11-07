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
        Schema::create('periodontals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('pembimbing');
            $table->foreignId('kartupasien_id');
            $table->foreignId('eksplakkal_id');

            $table->string('elemen_permukaan_gigi');
            $table->string('kalkulus');
            $table->string('pocket_depth');
            $table->tinyInteger('pocket_sakit');
            $table->tinyInteger('rubor');
            $table->tinyInteger('tumor');
            $table->tinyInteger('kolor');
            $table->tinyInteger('dolor');
            $table->tinyInteger('fungsio');
            $table->tinyInteger('attachment');
            $table->tinyInteger('pus');
            $table->string('dll')->nullable();
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
        Schema::dropIfExists('periodontals');
    }
};
