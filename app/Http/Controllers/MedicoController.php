<?php

namespace App\Http\Controllers;

use App\Consulta;

class MedicoController extends Controller
{
    public function consultaPorMedico($cpf)
    {

        
        $consultas = Consulta::where('corpo_clinico_pessoa_pessoa_cpf', $cpf)
		->join('prontuarios','prontuario_cod', '=', 'prontuarios_prontuario_cod')
		->join('pacientes','pacientes_pessoa_pessoa_cpf', '=', 'pessoa_pessoa_cpf')
		->join('pessoas','pessoa_cpf', '=', 'pessoa_pessoa_cpf')
		->get();

        return $consultas;
    }
}