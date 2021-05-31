<?php
namespace App\Http\Controllers;

use App\Pessoa;
use App\Convenio;
use App\Paciente;
use Illuminate\Http\Request;

class PessoasController
{
    
    public function index()
    {

        return Pessoa::all();

    }



    public function buscaPorCpf($cpf)
    {
        $pessoa =  Pessoa::where('pessoa_cpf', $cpf)
        ->join('prontuarios', 'pacientes_pessoa_pessoa_cpf','=','pessoa_cpf')
        ->join('pessoa_has_tipo_pessoa', 'pessoa_pessoa_cod', '=', 'pessoa_id')
        ->join('tipo_pessoa', 'tpessoa_cod','=','tipo_pessoa_tpessoa_cod')
        ->first();
        
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

    public function selecionaTipoAcesso($cpf)
    {
        $pessoa =  Pessoa::where('pessoa_cpf', $cpf)
        ->join('prontuarios', 'pacientes_pessoa_pessoa_cpf','=','pessoa_cpf')
        ->join('pessoa_has_tipo_pessoa', 'pessoa_pessoa_cod', '=', 'pessoa_id')
        ->join('tipo_pessoa', 'tpessoa_cod','=','tipo_pessoa_tpessoa_cod')
        ->get();
        
    return $pessoa;

    }


    public function store(Request $request)
    {

        return response()
            ->json(Pessoa::create($request->all()),201);

    }

    public function buscaPorNome(Request $request)
    {
    
        $paciente = Pessoa::where('pessoa_nome' , 'like',  '%'. $request->nome . '%')
        ->join('pacientes', 'pessoa_pessoa_cpf', '=' ,'pessoa_cpf')
        ->join('prontuarios', 'pacientes_pessoa_pessoa_cpf', '=' ,'pessoa_pessoa_cpf')
        
        ->get();

        return $paciente;
    }
    
}