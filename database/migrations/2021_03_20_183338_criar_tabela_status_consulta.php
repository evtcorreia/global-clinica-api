<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaStatusConsulta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ConsultaStatus', function (Blueprint $table) {
            
            $table->bigIncrements('status_id')->unsigned();
            $table->string('status_desc', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('statusConsulta', function (Blueprint $table) {
            //
        });
    }
}
