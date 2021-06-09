<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarReceitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receitas', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->date('receita_data');
            $table->string('receita_descricao')->nullable()->default(NULL);;
            $table->string('receita_D_E_L_E_T_')->default('');
            $table->bigInteger('consultas_consulta_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('consultas_consulta_id')
                    ->references('consulta_id')
                    ->on('consultas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receitas');
    }
}
