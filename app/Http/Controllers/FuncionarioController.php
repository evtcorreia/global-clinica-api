<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pessoa;

class FuncionarioController extends Controller
{
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



    DB::table('funcionarios')->insert(
            [
                'funcionario_dataAdmissao' => $request->funcionario_dataAdmissao,
                'funcionario_horarioTrabalho' => $request->funcionario_horarioTrabalho,
              
                'clinica_id' => $request->clinica_id,
                'pessoa_pessoa_cod' => $idPessoas,
                'pessoa_pessoa_cpf' => $request->pessoa_cpf,

                

            ]
    ) ; 
                  
/*
    $idPaciente =  DB::table('pacientes')->insertGetId(
        [
            'pessoa_pessoa_cpf'=> $request->pessoa_cpf,
            'paciente_sus_nr' => $request->paciente_sus_nr,
            'paciente_tipo_sang' => $request->paciente_tipo_sang,
            'paciente_fator_rh' => $request->paciente_fator_rh,
            'pessoa_pessoa_cod' => $idPessoas
        ]);
  
    DB::table('prontuarios')->insert(
        [
            'paciente_id' => $idPaciente,
            'pacientes_pessoa_pessoa_cpf' => $request->pessoa_cpf,
        ]);  
        
        
    DB::table('convenio_paciente')->updateOrInsert(
        [
            'convenio_id'=>$request->tipoDoc,
            'paciente_id'=> $idPaciente
        ]);
  */        
        
    //return response()
       // ->json(Pessoa::create($request->all()),201);

}

    public function informacoes($cpf)
    {
        $funcionario = Pessoa::where([
            ['pessoa_cpf', $cpf],
            ['pessoa_D_E_L_E_T_', '']
        ])
        ->join('funcionarios', 'pessoa_pessoa_cpf', '=' ,'pessoa_cpf')
        ->join('clinicas', 'clinicas.id', '=', 'clinica_id')
        ->first();

        return $funcionario;
    }

    public function demissaoFuncionario(Request $request)
    {
        DB::table('funcionarios')
        ->where('pessoa_pessoa_cpf', $request->pessoa_pessoa_cpf)
        ->update(
            [
                'funcionario_dataDemissao' => $request->funcionario_dataDemissao,
                
                
                
            ]);
    }
}