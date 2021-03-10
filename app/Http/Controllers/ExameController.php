<?php

namespace App\Http\Controllers;

use App\Exame;

Class ExameController
{
    public function show($id)
    {
        $exame = Exame::where('consultas_consulta_id', $id)->get();


        return $exame;
    }
}