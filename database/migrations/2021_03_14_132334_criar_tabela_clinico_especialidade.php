<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaClinicoEspecialidade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinico_especialidade', function (Blueprint $table) {
            $table->bigInteger('especialidade_id')->unsigned();
            $table->bigInteger('clinico_id')->unsigned();
            $table->timestamps();


            $table->foreign('especialidade_id')
                ->references('id')
                ->on('especialidades');

            $table->foreign('clinico_id')
                ->references('id')
                ->on('clinicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinico_especialidade');
    }
}
