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
        Schema::create('anamripasiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kartupasien_id');
            $table->text('klhn_utama');
            $table->text('klhn_tmbhn');
            $table->string('goldar');
            $table->string('nadi');
            $table->string('tknn_drh');
            $table->string('ktrgn_drh');
            $table->string('suhu');
            $table->string('pernafasan');
            $table->string('jantung');
            $table->string('diabetes');
            $table->string('haemophilia');
            $table->string('hepatitis');
            $table->string('lambung');
            $table->string('pnykt_ln');
            $table->string('nm_pnykt_ln')->nullable();
            $table->string('alergi_obat');
            $table->string('nm_obat')->nullable();
            $table->string('alergi_mkn');
            $table->string('nm_mkn')->nullable();
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
        Schema::dropIfExists('anamripasiens');
    }
};
