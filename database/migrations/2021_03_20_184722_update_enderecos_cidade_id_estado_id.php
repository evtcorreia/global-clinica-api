<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEnderecosCidadeIdEstadoId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enderecos', function (Blueprint $table) {
            //$table->bigInteger('estados_estado_id')->unsigned();
            $table->bigInteger('cidades_cidade_id')->unsigned();

            //$table->foreign('estados_estado_id')
              //  ->references('id')
                //->on('estados');

            $table->foreign('cidades_cidade_id')
                ->references('id')
                ->on('cidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enderecos', function (Blueprint $table) {
            //
        });
    }
}
