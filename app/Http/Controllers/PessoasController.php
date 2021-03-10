<?php
namespace App\Http\Controllers;

use App\Convenio;
use App\Paciente;
use App\Pessoa;

class PessoasController
{
    
    public function index()
    {

        return Pessoa::all();

    }



    public function buscaPorCpf($cpf)
    {


        $pessoa =  Pessoa::where('pessoa_cpf', $cpf)->first();
        
    return $pessoa;

    }
    
}