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
            $table->bigIncrements('endereco_id')->unsigned();
            $table->string('endereco_logradouro');
            $table->string('endereco_bairro');
            $table->string('endereco_numero');
            $table->string('endereco_complemento');
            $table->string('endereco_D_E_L_E_T_')->default('');
            $table->string('endereco_cep');
            //$table->string('endereco_cidade');
            $table->string('endereco_pais');
            $table->integer('pessoa_pessoa_cod');
            $table->string('pessoa_pessoa_cpf', 11);
            $table->bigInteger('estados_estado_id')->unsigned();
            $table->timestamps();

            //$table->foreign('pessoa_pessoa_cpf')
                    //->references('pessoa_cpf')
                    //->on('pessoas');

            $table->foreign('estados_estado_id')
                    ->references('id')
                    ->on('estados');       
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
