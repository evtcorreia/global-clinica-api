<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarFuncionarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->char('funcionarios_D_E_L_E_T_')->default('');
            $table->string('funcionario_registro_numero');
            $table->date('funcionario_dataAdmissao');
            $table->date('funcionario_dataDemissao');
            $table->time('funcionario_horarioTrabalho');
            $table->bigInteger('clinicas_clinica_cod')->unsigned();
            $table->bigInteger('pessoa_pessoa_cod')->unsigned();
            $table->string('pessoa_pessoa_cpf',11);
            $table->timestamps();

            $table->foreign('clinicas_clinica_cod')
                    ->references('id')
                    ->on('clinicas');
            $table->foreign('pessoa_pessoa_cod')
                    ->references('pessoa_id')
                    ->on('pessoas');
            $table->foreign('pessoa_pessoa_cpf')
                    ->references('pessoa_cpf')
                    ->on('pessoas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
