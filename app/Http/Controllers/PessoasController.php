<?php
namespace App\Http\Controllers;

use App\Pessoa;
use App\Convenio;
use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PessoasController
{
    
    public function index()
    {

        return Pessoa::all();

    }



    public function buscaPorCpf($cpf)
    {
        
        $pessoa =  Pessoa::where([
            ['pessoa_cpf', $cpf],
            ['pessoa_D_E_L_E_T_', '=','']
        ])
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
        //->join('prontuarios', 'pacientes_pessoa_pessoa_cpf','=','pessoa_cpf')
        ->join('pessoa_has_tipo_pessoa', 'pessoa_pessoa_cod', '=', 'pessoa_id')
        ->join('tipo_pessoa', 'tpessoa_cod','=','tipo_pessoa_tpessoa_cod')
        ->get();
        
    return $pessoa;

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
            
            
        //return response()
           // ->json(Pessoa::create($request->all()),201);

    }

    public function buscaPorNome(Request $request)
    {
    
        $paciente = Pessoa::where('pessoa_nome' , 'like',  '%'. $request->nome . '%')
        ->join('pacientes', 'pessoa_pessoa_cpf', '=' ,'pessoa_cpf')
        ->join('prontuarios', 'pacientes_pessoa_pessoa_cpf', '=' ,'pessoa_pessoa_cpf')        
        ->get();

        return $paciente;
    }

    public function trazerRecepcionista($cpf)
    {
        $pessoa = Pessoa::where([
            ['pessoa_cpf', $cpf],
            ['tpessoa_cod', '=', '3']
            ])
        ->join('funcionarios', 'pessoa_pessoa_cpf', '=' ,'pessoa_cpf')
        ->join('pessoa_has_tipo_pessoa', 'pessoa_has_tipo_pessoa.pessoa_pessoa_cod', '=', 'pessoa_id')
        ->join('tipo_pessoa', 'tpessoa_cod', '=' ,'tipo_pessoa_tpessoa_cod')
        ->join('clinicas', 'clinicas.id', '=', 'clinica_id')        
        ->first();

        return $pessoa;
    }

    public function buscaPorLogin($cpf)
    {
        
        $pessoa =  Pessoa::where('pessoa_cpf', $cpf)
        ->first();
        
    return $pessoa;
    }
	
	public function alteraTelefone(Request $request)
	{
        DB::table('telefones')
        ->where('telefone_cod', $request->telefone_cod )
        ->update(
            [
				
                'telefone_area' => $request->telefone_area,
				'telefone_num' => $request->telefone_num
                
            ]);
    }
	
    
}