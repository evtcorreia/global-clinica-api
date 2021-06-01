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
        
    public function consultasPorClinica($id)
    {
        $consultas = Consulta::where('clinicas_id', $id)
        ->join('clinicas', 'clinicas.id', '=', 'consultas.clinicas_id')
        ->join('funcionarios', 'funcionarios.clinica_id', '=', 'clinicas.id')
        ->join('pessoas', 'pessoa_cpf', '=','pessoa_pessoa_cpf')
        ->get();

        return $consultas;
    }
    
}