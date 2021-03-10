<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTelefones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefones', function (Blueprint $table) {
            $table->increments('telefone_cod');
            $table->string('telefone_area');
            $table->string('telefone_num');
            $table->char('telefone_D_E_L_E_T_',1)->default('');
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
        Schema::dropIfExists('telefones');
    }
}
