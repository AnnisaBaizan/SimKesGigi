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
            $table->tinyInteger('pembimbing');
                        //kelainan Gigi
                        $table->foreignId('kartupasien_id');
                        $table->string('kode_11')->nullable();
                        $table->string('kode_21')->nullable();
                        $table->string('kode_12')->nullable();
                        $table->string('kode_22')->nullable();
                        $table->string('kode_13')->nullable();
                        $table->string('kode_23')->nullable();
                        $table->string('kode_14')->nullable();
                        $table->string('kode_24')->nullable();
                        $table->string('kode_15')->nullable();
                        $table->string('kode_25')->nullable();
                        $table->string('kode_16')->nullable();
                        $table->string('kode_26')->nullable();
                        $table->string('kode_17')->nullable();
                        $table->string('kode_27')->nullable();
                        $table->string('kode_18')->nullable();
                        $table->string('kode_28')->nullable();
                        
                        $table->string('kode_41')->nullable();
                        $table->string('kode_31')->nullable();
                        $table->string('kode_42')->nullable();
                        $table->string('kode_32')->nullable();
                        $table->string('kode_43')->nullable();
                        $table->string('kode_33')->nullable();
                        $table->string('kode_44')->nullable();
                        $table->string('kode_34')->nullable();
                        $table->string('kode_45')->nullable();
                        $table->string('kode_35')->nullable();
                        $table->string('kode_46')->nullable();
                        $table->string('kode_36')->nullable();
                        $table->string('kode_47')->nullable();
                        $table->string('kode_37')->nullable();
                        $table->string('kode_48')->nullable();
                        $table->string('kode_38')->nullable();
                        
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
                        $table->string('gigi_karies');
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
