<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Prontuario;

class ConsultasController
{
    public function show($id)
    {
        $consulta = Consulta::where('consulta_id', $id)->first();

        $receitas = $consulta->receitas()->get();

        return $receitas;
    }
        
    
}