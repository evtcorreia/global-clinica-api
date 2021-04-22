<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTabelaEnderecosDeleteCampoPessoaIdPessoaCpf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enderecos', function (Blueprint $table) {

            //$table->dropForeign(['pessoa_pessoa_cod','pessoa_pessoa_cpf' ]);            
            $table->dropColumn(['pessoa_pessoa_cod','pessoa_pessoa_cpf' ]);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('endereco_update');
    }
}
