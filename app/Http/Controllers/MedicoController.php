<?php

namespace App\Http\Controllers;

use App\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    public function store(Request $request)
    {
        $idEndereco = DB::table('enderecos')->insertGetId(
            [
                'endereco_logradouro' => $request->endereco_logradouro,
                'endereco_bairro' => $request->endereco_bairro,
                'endereco_numero' => $request->endereco_numero,
                'endereco_complemento' => $request->endereco_complemento,
                'endereco_cep' => $request->endereco_cep,
                'endereco_pais' => $request->endereco_pais,
                'estados_estado_id' =>$request->estados_estado_id,
                'cidades_cidade_id' => $request->cidades_cidade_id,
                
                
            ]);
    $idPessoas = DB::table('pessoas')->insertGetId(
            [
                'pessoa_nome' => $request->pessoa_nome,
                'pessoa_sobrenome' => $request->pessoa_sobrenome,
                'pessoa_cpf' => $request->pessoa_cpf,
                'pessoa_rg' => $request->pessoa_rg,
                'pessoa_pai' => $request->pessoa_pai,
                'pessoa_mae' => $request->pessoa_mae,
                'pessoa_mail' => $request->pessoa_mail,
                'pessoa_login' => $request->pessoa_cpf,
                'pessoa_senha' => $request->pessoa_senha,
                'enderecos_endereco_id' => $idEndereco

            ]);

    DB::table('pessoa_has_tipo_pessoa')->insert(
            [
                'pessoa_pessoa_cod' => $idPessoas,
                'tipo_pessoa_tpessoa_cod' => $request->tpessoa
            ]);

    DB::table('telefones')->insert(
            [
                'telefone_area' => $request->telefone_area,
                'telefone_num' => $request->telefone_num,
                'pessoa_pessoa_cod' => $idPessoas,
                'pessoa_pessoa_cpf' => $request->pessoa_cpf
            ]);

    $idClinico =DB::table('clinicos')->insertGetId(
        [
            'clinico_prof_doc' => $request->clinico_prof_doc,
            'pessoa_pessoa_cpf' => $request->pessoa_cpf,
            'tipo_documento_tipo_id' => $request->tipo_documento_tipo_id
            
        ]);

    DB::table('clinico_especialidade')->insert(

        [
            'clinico_id' => $idClinico,
            'especialidade_id' => $request->especialidade_id

        ]);

    DB::table('clinica_clinico')->insert(
        [
            'clinico_id' => $idClinico,
            'clinica_id' => $request->clinica_id
        ]
        );    
    

/*
    DB::table('funcionarios')->insert(
            [
                'funcionario_dataAdmissao' => $request->funcionario_dataAdmissao,
                'funcionario_horarioTrabalho' => $request->funcionario_horarioTrabalho,
              
                'clinica_id' => $request->clinica_id,
                'pessoa_pessoa_cod' => $idPessoas,
                'pessoa_pessoa_cpf' => $request->pessoa_cpf,

                

            ]
    ) ; 
    */
    }
}