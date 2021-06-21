<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarHistoricoFamiliarDoencas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicoFamiliarDoencas', function (Blueprint $table) {
            $table->increments('hisFam_id')->unsigned();
            $table->string('hisFam_desc');
            $table->char('hisFam_D_E_L_E_T_')->default('');
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
        Schema::dropIfExists('historicoFamiliarDoencas');
    }
}
