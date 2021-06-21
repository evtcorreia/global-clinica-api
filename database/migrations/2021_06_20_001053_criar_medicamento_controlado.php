<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarMedicamentoControlado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamento_controlado', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('medControl_desc');
            $table->string('medicamento_controlado_D_E_L_E_T_')->default('');
            $table->bigInteger('prontuarios_prontuario_cod')->unsigned();
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
        Schema::dropIfExists('medicamento_controlado');
    }
}
