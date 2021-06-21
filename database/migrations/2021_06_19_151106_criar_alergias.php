<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarAlergias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alergias', function (Blueprint $table) {
            $table->increments('alergias_id')->unsigned();
            $table->string('alergia_desc');
            $table->bigInteger('prontuarios_prontuario_cod')->unsigned();
            $table->char('alergia_D_E_L_E_T_')->default('');
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
        Schema::dropIfExists('alergias');
    }
}
