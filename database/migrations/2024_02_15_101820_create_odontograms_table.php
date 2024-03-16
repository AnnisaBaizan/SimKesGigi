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
        Schema::create('odontograms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('pembimbing');
            //kelainan Gigi
            $table->foreignId('kartupasien_id');
            $table->tinyInteger('kode_11')->nullable();
            $table->tinyInteger('kode_21')->nullable();
            $table->tinyInteger('kode_12')->nullable();
            $table->tinyInteger('kode_22')->nullable();
            $table->tinyInteger('kode_13')->nullable();
            $table->tinyInteger('kode_23')->nullable();
            $table->tinyInteger('kode_14')->nullable();
            $table->tinyInteger('kode_24')->nullable();
            $table->tinyInteger('kode_15')->nullable();
            $table->tinyInteger('kode_25')->nullable();
            $table->tinyInteger('kode_16')->nullable();
            $table->tinyInteger('kode_26')->nullable();
            $table->tinyInteger('kode_17')->nullable();
            $table->tinyInteger('kode_27')->nullable();
            $table->tinyInteger('kode_18')->nullable();
            $table->tinyInteger('kode_28')->nullable();
            
            $table->tinyInteger('kode_41')->nullable();
            $table->tinyInteger('kode_31')->nullable();
            $table->tinyInteger('kode_42')->nullable();
            $table->tinyInteger('kode_32')->nullable();
            $table->tinyInteger('kode_43')->nullable();
            $table->tinyInteger('kode_33')->nullable();
            $table->tinyInteger('kode_44')->nullable();
            $table->tinyInteger('kode_34')->nullable();
            $table->tinyInteger('kode_45')->nullable();
            $table->tinyInteger('kode_35')->nullable();
            $table->tinyInteger('kode_46')->nullable();
            $table->tinyInteger('kode_36')->nullable();
            $table->tinyInteger('kode_47')->nullable();
            $table->tinyInteger('kode_37')->nullable();
            $table->tinyInteger('kode_48')->nullable();
            $table->tinyInteger('kode_38')->nullable();
            
            $table->string('kode_51')->nullable();
            $table->string('kode_61')->nullable();
            $table->string('kode_52')->nullable();
            $table->string('kode_62')->nullable();
            $table->string('kode_53')->nullable();
            $table->string('kode_63')->nullable();
            $table->string('kode_54')->nullable();
            $table->string('kode_64')->nullable();
            $table->string('kode_55')->nullable();
            $table->string('kode_65')->nullable();
            
            $table->string('kode_81')->nullable();
            $table->string('kode_71')->nullable();
            $table->string('kode_82')->nullable();
            $table->string('kode_72')->nullable();
            $table->string('kode_83')->nullable();
            $table->string('kode_73')->nullable();
            $table->string('kode_84')->nullable();
            $table->string('kode_74')->nullable();
            $table->string('kode_85')->nullable();
            $table->string('kode_75')->nullable();
            
            $table->tinyInteger('jumlah_tetap_d');
            $table->tinyInteger('jumlah_tetap_m');
            $table->tinyInteger('jumlah_tetap_f');
            $table->tinyInteger('dmf_t');
            $table->tinyInteger('jumlah_susu_d');
            $table->tinyInteger('jumlah_susu_e');
            $table->tinyInteger('jumlah_susu_f');
            $table->tinyInteger('def_t');
            $table->text('gigi_karies')->nullable();
            
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
        Schema::dropIfExists('odontograms');
    }
};
