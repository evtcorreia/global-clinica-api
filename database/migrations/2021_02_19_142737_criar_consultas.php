<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarConsultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->bigIncrements('consulta_id')->unsigned();
            $table->date('consulta_data');
            $table->time('consulta_horario');
            $table->string('consulta_info')->nullable()->default(NULL);;
            $table->string('consulta_laudo')->nullable()->default(NULL);
            $table->string ('consulta_obs')->nullable()->default(NULL);
            $table->bigInteger('consulta_status_status_id')->unsigned()->default('1');
            $table->string('consulta_D_E_L_E_T_',1)->default('');
            $table->bigInteger('prontuarios_prontuario_cod')->unsigned();
            $table->string('corpo_clinico_pessoa_pessoa_cpf',11);
            $table->timestamps();

            $table->foreign('prontuarios_prontuario_cod')
                    ->references('prontuario_cod')
                    ->on('prontuarios');
            $table->foreign('corpo_clinico_pessoa_pessoa_cpf')
                    ->references('pessoa_pessoa_cpf')
                    ->on('clinicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
