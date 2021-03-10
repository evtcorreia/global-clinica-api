<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarPivoPessoaHasTipoPessoa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_has_tipo_pessoa', function (Blueprint $table) {
            $table->bigInteger('pessoa_pessoa_cod')->unsigned();
            $table->bigInteger('tipo_pessoa_tpessoa_cod')->unsigned();
            $table->timestamps();

            $table->foreign('pessoa_pessoa_cod')
                    ->references('pessoa_id')
                    ->on('pessoas');
            $table->foreign('tipo_pessoa_tpessoa_cod')
                    ->references('tpessoa_cod')
                    ->on('tipo_pessoa');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_has_tipo_pessoa');
    }
}
