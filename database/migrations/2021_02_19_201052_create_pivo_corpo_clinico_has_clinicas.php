<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivoCorpoClinicoHasClinicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinica_clinico', function (Blueprint $table) {
            $table->bigInteger('clinico_id')->unsigned();
            $table->bigInteger('clinica_id')->unsigned();
            $table->timestamps();

            $table->foreign('clinica_id')
                    ->references('id')
                    ->on('clinicas');
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
        Schema::dropIfExists('corpo_clinico_has_clinicas');
    }
}
