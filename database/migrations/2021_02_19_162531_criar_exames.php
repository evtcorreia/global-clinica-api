<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarExames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exames', function (Blueprint $table) {
            $table->increments('exames_cod');
            $table->date('exame_data');
            $table->string('exame_resultado');
            $table->char('exame_D_E_L_E_T_')->default('');
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
        Schema::dropIfExists('exames');
    }
}
