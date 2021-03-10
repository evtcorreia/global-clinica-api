<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTipoPessoa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_pessoa', function (Blueprint $table) {
            $table->bigIncrements('tpessoa_cod')->unsigned();
            $table->string('tpessoa_desc');
            $table->char('tpessoa_D_E_L_E_T_')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_pessoa');
    }
}
