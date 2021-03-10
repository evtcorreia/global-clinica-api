<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConveniosHasPacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenio_paciente', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('convenio_id')->unsigned();
            $table->bigInteger('paciente_id')->unsigned();
            $table->timestamps();


            $table->foreign('convenio_id')
                    ->references('id')
                    ->on('convenios');
                    
            $table->foreign('paciente_id')
                    ->references('id')
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
        Schema::dropIfExists('convenios_has_pacientes');
    }
}
