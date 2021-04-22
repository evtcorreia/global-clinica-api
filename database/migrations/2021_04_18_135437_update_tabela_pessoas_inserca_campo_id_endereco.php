<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTabelaPessoasInsercaCampoIdEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pessoas', function (Blueprint $table) {

            $table->bigInteger('enderecos_endereco_id')->unsigned();


            $table->foreign('enderecos_endereco_id')
            ->references('endereco_id')
            ->on('enderecos');

        });

        
    }
        
        

        

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('update_pessoas_endereco');
    }
}
