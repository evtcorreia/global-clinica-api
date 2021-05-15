<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Prontuario;
use Illuminate\Http\Request;

class ConsultasController
{
    public function show($id)
    {
        $consulta = Consulta::where('consulta_id', $id)->first();

        $receitas = $consulta->receitas()->get();

        return $receitas;
    }


    public function store(Request $request)
    {

        //var_dump($request->consulta_data);
        //var_dump($request->consulta_horario);
        //exit();
            return response()
            ->json(Consulta::create($request->all()),201);
    }
        
    
}