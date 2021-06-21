<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarDst extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dst', function (Blueprint $table) {
            $table->increments('dst_id')->unsigned();
            $table->string('dst_desc');
            $table->bigInteger('prontuarios_prontuario_cod')->unsigned();
            $table->char('dst_D_E_L_E_T_')->default('');            
            $table->timestamps();

            $table->foreign('prontuarios_prontuario_cod')
                ->references('prontuario_cod')
                ->on('prontuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dst');
    }
}
