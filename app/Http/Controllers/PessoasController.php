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
    
    public function buscaTelefones($cpf)
    {
        $pessoa = Pessoa::where('pessoa_cpf', $cpf)->first();

        $telefone = $pessoa->telefones()->get();

        return $telefone;
    }

    public function buscaEnderecos($cpf)
    {
        $pessoa = Pessoa::where('pessoa_cpf', $cpf)->first();

        $endereco = $pessoa->endereco()->first();


        $estado = $endereco->estado()->first();



        return $endereco;
        
    }
    
}