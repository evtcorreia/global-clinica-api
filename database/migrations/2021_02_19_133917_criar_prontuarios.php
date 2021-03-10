<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarProntuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prontuarios', function (Blueprint $table) {
            $table->bigIncrements('prontuario_cod')->unsigned();
            $table->string ('pacientes_pessoa_pessoa_cpf',11);
            $table->char('prontuario_D_E_L_E_T_')->default('');
            $table->timestamps();

            $table->foreign('pacientes_pessoa_pessoa_cpf')
                    ->references('pessoa_pessoa_cpf')
                    ->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prontuarios');
    }
}
