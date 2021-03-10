<?php

namespace App\Http\Controllers;

use App\Paciente;

class PacientesController
{
    public function show($cpf)
    {
        $paciente = Paciente::where('pessoa_pessoa_cpf', $cpf)->first();

        return $paciente;

        


    }
    
}
