<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarComorbidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comorbidades', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('comorbidade_desc');
            $table->bigInteger('prontuarios_prontuario_cod')->unsigned();
            $table->char('comorbidades_D_E_L_E_T_')->default('');
            $table->timestamps();


            $table->foreign('prontuarios_prontuario_cod')
                ->references('prontuario_cod')
                ->on ('prontuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comorbidades');
    }
}
