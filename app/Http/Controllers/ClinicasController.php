<?php  


use App\Clinica;
use App\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


    namespace App\Http\Controllers;

    use App\Clinica;
    use App\Endereco;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use App\Pessoa;

    class ClinicasController
    {
        public function show($id)
        {
            
            $enderecos = Endereco::where('cidades_cidade_id', $id)
                ->join('clinicas', 'enderecos_endereco_id', '=','endereco_id')
                ->get();
            return $enderecos;
        }

        public function especialidades($id)
        {   
            $especialidades = Clinica::where('clinicas.id', $id)
                ->join('clinica_clinico', 'clinica_clinico.clinica_id', '=', 'clinicas.id')
                ->join('clinicos', 'clinicos.id','=','clinica_clinico.clinico_id')
                ->join('clinico_especialidade', 'clinico_especialidade.clinico_id','=', 'clinicos.id')
                ->join('especialidades', 'especialidades.id','=', 'clinico_especialidade.especialidade_id')
                ->get();

            return $especialidades;
        }

        public function store(Request $request)
        {

          

            $endereco_id = DB::table('enderecos')->insertGetId(

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
            $clinica_id = DB::table('clinicas')->insertGetId(
                [
                    'clinica_nome' => $request->clinica_nome,
                    'clinica_cnpj' =>$request->clinica_cnpj,
                    'clinica_mail' => $request->clinica_mail,
                    'enderecos_endereco_id' =>  $endereco_id,
                    'clinica_telefone_area' => $request->clinica_telefone_area,
                    'clinica_telefone_num' => $request->clinica_telefone_num,
                ]);      
            }



            public function funcionarioPorClinica($id)
            {

                $funcionarios = Clinica::where([
                    
                    
                    ['clinicas.id', $id],
                    ['clinica_D_E_L_E_T_', ''],
                    ['funcionarios_D_E_L_E_T_', ''],
                    ['funcionario_dataDemissao', null]
                ])

                ->join('funcionarios', 'clinica_id', '=', 'clinicas.id')
                ->join('pessoas', 'pessoa_pessoa_cpf', '=' ,'pessoa_cpf')
                ->get();



                return $funcionarios;




            }

            public function clinicaDoAdm($cpf)
            {
                $clinicaDoAdm = Pessoa::where([
                    ['pessoa_cpf', $cpf],
                    ['pessoa_D_E_L_E_T_' , ''],
                    
                ])
                ->join('funcionarios', 'pessoa_pessoa_cpf', '=' ,'pessoa_cpf' )
                ->join('clinicas', 'clinicas.id', '=', 'clinica_id')
                ->get();


                return $clinicaDoAdm;
            }

    }