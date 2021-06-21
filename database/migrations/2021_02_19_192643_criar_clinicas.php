<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarClinicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinicas', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('clinica_nome');
            $table->string('clinica_cnpj',18);
            $table->string('clinica_mail', 50);
            $table->char('clinica_D_E_L_E_T_')->default('');
            $table->string('clinica_telefone_area');
            $table->string('clinica_telefone_num');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinicas');
    }
}
