<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivoCorpoClinicoHasClinicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corpo_clinico_has_clinicas', function (Blueprint $table) {
            $table->string('clinicos_pessoa_pessoa_cpf', 11);
            $table->bigInteger('clinicas_clinica_cod')->unsigned();
            $table->timestamps();

            $table->foreign('clinicos_pessoa_pessoa_cpf')
                    ->references('pessoa_pessoa_cpf')
                    ->on('clinicos');
            $table->foreign('clinicas_clinica_cod')
                    ->references('clinica_id')
                    ->on('clinicas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corpo_clinico_has_clinicas');
    }
}
