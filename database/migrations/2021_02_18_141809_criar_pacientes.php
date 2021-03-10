<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarPacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('paciente_sus_nr',20);
            $table->char('paciente_D_E_L_E_T_',1)->default('');
            $table->char('paciente_tipo_sang',1);
            $table->char('paciente_fator_rh', 8);
            $table->integer('pessoa_pessoa_cod');
            $table->string('pessoa_pessoa_cpf',11);
            $table->timestamps();

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
        Schema::dropIfExists('pacientes');
    }
}
