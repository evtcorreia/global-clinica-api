<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarEndercos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('endereco_id');
            $table->string('endereco_logradouro');
            $table->string('endereco_bairro');
            $table->string('endereco_numero');
            $table->string('endereco_complemento');
            $table->string('endereco_D_E_L_E_T_')->default('');
            $table->string('endereco_cep');
            $table->string('endereco_cidade');
            $table->string('endereco_estado');
            $table->string('endereco_pais');
            $table->integer('pessoa_pessoa_cod');
            $table->string('pessoa_pessoa_cpf', 11);
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
        Schema::dropIfExists('enderecos');
    }
}
