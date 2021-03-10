<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarClinicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinicos', function (Blueprint $table) {
            $table->increments('clinicos_id');
            $table->string('pessoa_pessoa_cpf',11);
            $table->string('clinico_especialidades');
            $table->string('clinico_prof_doc');
            $table->char('clinico_D_E_L_E_T',1)->default('');
            $table->bigInteger('tipo_documento_tipo_id')->unsigned();
            $table->timestamps();

            $table->foreign('pessoa_pessoa_cpf')
                    ->references('pessoa_cpf')
                    ->on('pessoas');
            $table->foreign('tipo_documento_tipo_id')
                    ->references('tipo_id')
                    ->on('tipo_documentos');        


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinicos');
    }
}
