<?php

namespace App\Http\Controllers;

use App\Paciente;

class PacientesController
{
    public function show($cpf)
    {
        $paciente = Paciente::where('pessoa_pessoa_cpf', $cpf)
            ->join('prontuarios', 'pessoa_pessoa_cpf', '=' ,'pacientes_pessoa_pessoa_cpf')
            ->first();

        return $paciente;

        


    }
    
}
