<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Prontuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultasController
{
    public function show($id)
    {
        $consulta = Consulta::where('consulta_id', $id)->first();

        $receitas = $consulta->receitas()->get();

        return $receitas;
    }


    public function store(Request $request)
    {

        //var_dump($request->consulta_data);
        //var_dump($request->consulta_horario);
        //exit();
            return response()
            ->json(Consulta::create($request->all()),201);
    }
        
    public function consultasPorClinica($id)
    {
        $consultas = Consulta::where([
			['clinicas_id', $id],
			['clinica_D_E_L_E_T_', ''],
			['prontuario_D_E_L_E_T_', ''],
			['paciente_D_E_L_E_T_',''],
			['pessoa_D_E_L_E_T_',''],
			['consulta_D_E_L_E_T_','']
			
			])
        
        ->join('clinicas', 'clinicas.id', '=', 'consultas.clinicas_id')
        //->join('funcionarios', 'funcionarios.clinica_id', '=', 'clinicas.id')
        //->join('pessoas', 'pessoas.pessoa_cpf as cpf_secretaria', '=','funcionario.pessoa_pessoa_cpf')
		->join('prontuarios', 'prontuarios.prontuario_cod', '=', 'consultas.prontuarios_prontuario_cod')
		->join('pacientes', 'pacientes.pessoa_pessoa_cpf', '=', 'prontuarios.pacientes_pessoa_pessoa_cpf')
        ->join('pessoas', 'pessoas.pessoa_cpf', '=', 'pacientes.pessoa_pessoa_cpf')
		->join ('ConsultaStatus','status_id','=','consulta_status_status_id')
        ->orderBy('consulta_horario')
        ->get();

        return $consultas;
    }


    public function gravarDadosConsulta(Request $request)
    {




            $obj = json_encode($request->medicamento);

            var_dump($obj);
            exit();

            
        
            foreach($request->medicamento as $medicamentos)
            {
                foreach($medicamentos as $key=>$valor){
                    $arr[$key][] =  $valor;
                }
            }



            //var_dump($arr[0][0]);
            //exit();

        DB::table('consultas')
            ->where('consulta_id', $request->consulta_id )
            ->update(
            [
                'consulta_info' => $request->consulta_info,
                'consulta_laudo' => $request->consulta_laudo,
                'consulta_obs' => $request->consulta_obs
            ]);
            


        DB::table('exames')->updateOrInsert(
            [
                'exame_data' => $request->exame_data,
                'exame_resultado' => $request->exame_resultado,
                'consultas_consulta_id' => $request->consultas_consulta_id
            ]);

        $idReceita = DB::table('receitas')->insertGetId(
            [
                'receita_data' => $request->receita_data,
                'receita_descricao' => $request->receita_descricao,
                'consultas_consulta_id' => $request->consultas_consulta_id
            ]);


                    $posologiaId = '';
                    

                   // var_dump($rot);
                   //exit();
                    for($i = 0; $i < count($arr); $i++)
                    {
                        /*
                        DB::table('medicamento_receita')->updateOrInsert(
                            [
                            'medicamento_id' => $arr[$i][0],
                            'receita_id' => $idReceita
                            
                            ]);
                            */
                        //for($l = 1; $l <= 3; $l++)
                        //{
                            $posologiaId = DB::table('posologias')->insertGetId(
                                    [   
                                    'posologia_posologia' => $arr[$i][1],
                                    'posologia_quantidade' => $arr[$i][2],
                                    'posologia_tipo' => $arr[$i][3],
                                ]);
                                
                                DB::table('medicamento_receita')->insert(
                                    [
                                        'medicamento_id' => $arr[$i][0],
                                        'receita_id' => $idReceita,
                                    'posologias_id' => $posologiaId,
                                    
                                ]);
                
                        //}
            
                    }
                

/*        
            foreach( $request->medicamento_id as $medicamento)
        {
            DB::table('medicamento_receita')->insert(
                [
                    'medicamento_id' => $medicamento,
                    'receita_id' => $idReceita
                ]);
    
        }

 */       

    }

    public function alteraHora(Request $request)
    {
        DB::table('consultas')
        ->where('consulta_id', $request->consulta_id )
        ->update(
            [
				
                'consulta_horario' => $request->consulta_horario,
                
            ]);
    }
    public function alteraStatus(Request $request)
    {
        DB::table('consultas')
        ->where('consulta_id', $request->consulta_id )
        ->update(
            [
				
                'consulta_status_status_id' => $request->consulta_status,
                
            ]);
    }
	
	 public function alteraData(Request $request)
    {
        DB::table('consultas')
        ->where('consulta_id', $request->consulta_id )
        ->update(
            [
				
                'consulta_data' => $request->consulta_data,
                
            ]);
    }
	
	public function deletaConsulta(Request $request)
    {
        DB::table('consultas')
        ->where('consulta_id', $request->consulta_id )
        ->update(
            [
				
                'consulta_D_E_L_E_T_' => $request->consulta_D_E_L_E_T_,
                
            ]);
    }
	
	
    
}