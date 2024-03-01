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
        Schema::create('kartupasiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->tinyInteger('pembimbing');
            $table->string('no_kartu')->unique();
            $table->string('nama');
            $table->string('no_iden')->unique();
            $table->date('tgl_lhr');
            $table->string('umur');
            $table->tinyInteger('jk');
            $table->string('suku');
            $table->string('pekerjaan');
            $table->string('hub');
            $table->string('no_hp');
            $table->string('no_tlpn');
            $table->text('alamat');
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
        Schema::dropIfExists('kartupasiens');
    }
};
