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
                        //kelainan Gigi
                        $table->foreignId('kartupasien_id');
                        $table->string('11');
                        $table->string('21');
                        $table->string('12');
                        $table->string('22');
                        $table->string('13');
                        $table->string('23');
                        $table->string('14');
                        $table->string('24');
                        $table->string('15');
                        $table->string('25');
                        $table->string('16');
                        $table->string('26');
                        $table->string('17');
                        $table->string('27');
                        $table->string('18');
                        $table->string('28');
            
                        $table->string('41');
                        $table->string('31');
                        $table->string('42');
                        $table->string('32');
                        $table->string('43');
                        $table->string('33');
                        $table->string('44');
                        $table->string('34');
                        $table->string('45');
                        $table->string('35');
                        $table->string('46');
                        $table->string('36');
                        $table->string('47');
                        $table->string('37');
                        $table->string('48');
                        $table->string('38');
                        
                        $table->string('51');
                        $table->string('61');
                        $table->string('52');
                        $table->string('62');
                        $table->string('53');
                        $table->string('63');
                        $table->string('54');
                        $table->string('64');
                        $table->string('55');
                        $table->string('65');
                        
                        $table->string('81');
                        $table->string('71');
                        $table->string('82');
                        $table->string('72');
                        $table->string('83');
                        $table->string('73');
                        $table->string('84');
                        $table->string('74');
                        $table->string('85');
                        $table->string('75');
                        
                        $table->tinyInteger('jumlah_tetap_d');
                        $table->tinyInteger('jumlah_tetap_m');
                        $table->tinyInteger('jumlah_tetap_f');
                        $table->tinyInteger('total_tetap');
                        $table->tinyInteger('jumlah_susu_d');
                        $table->tinyInteger('jumlah_susu_m');
                        $table->tinyInteger('jumlah_susu_f');
                        $table->tinyInteger('total_susu');
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
