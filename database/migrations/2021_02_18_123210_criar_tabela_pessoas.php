<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaPessoas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->bigIncrements('pessoa_id')->unsigned();
            $table->string('pessoa_nome', 25);
            $table->string('pessoa_sobrenome', 40);
            $table->string('pessoa_cpf',11)->unique();
            $table->string('pessoa_rg', 20)->default('');
            $table->string('pessoa_pai',50)->default('');
            $table->string('pessoa_mae',50)->default('');
            $table->string('pessoa_mail',50);
            $table->char('pessoa_D_E_L_E_T_',1)->default('');
            $table->string('pessoa_login', 11);
            $table->string('pessoa_senha',255);
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
        Schema::dropIfExists('pessoas');
    }
}
