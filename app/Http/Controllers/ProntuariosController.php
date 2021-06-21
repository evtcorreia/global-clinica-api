<?php

    namespace App\Http\Controllers;

use App\Prontuario;

Class ProntuariosController
    {
        public function show($cpf)
        {
			
			$consultas = Prontuario::Where([
			
				['pacientes_pessoa_pessoa_cpf', $cpf],
				['prontuario_D_E_L_E_T_', '=',''],
				['consulta_D_E_L_E_T_', '=',''],
				['paciente_D_E_L_E_T_', '=',''],
				['pessoa_D_E_L_E_T_', '=',''],
			])
			
			->join('consultas', 'prontuarios_prontuario_cod', '=' , 'prontuario_cod')
            ->join('pacientes', 'pacientes_pessoa_pessoa_cpf', '=', 'pessoa_pessoa_cpf')
            ->join('pessoas', 'pessoa_cpf','=', 'pessoa_pessoa_cpf')
            ->get();
			
			
			/*
            $prontuario = Prontuario::where('pacientes_pessoa_pessoa_cpf' , $cpf)->first();

            $consultas = $prontuario->consultas()
            ->join('prontuarios', 'prontuarios_prontuario_cod', '=' , 'prontuario_cod')
            ->join('pacientes', 'pacientes_pessoa_pessoa_cpf', '=', 'pessoa_pessoa_cpf')
            ->join('pessoas', 'pessoa_cpf','=', 'pessoa_pessoa_cpf')
            ->get();
			
			*/

            return $consultas;
        }

        public function consultasAbertas($cpf)
        {
            $prontuario = Prontuario::where('pacientes_pessoa_pessoa_cpf' , $cpf)->first();

            $consultas = $prontuario->consultas()
                ->where('consulta_status_status_id' , '2')
                ->get();

            return $consultas;
        }
        public function consultasFinalizadas($cpf)
        {
            $prontuario = Prontuario::where('pacientes_pessoa_pessoa_cpf' , $cpf)->first();

            $consultas = $prontuario->consultas()
                ->where('consulta_status_status_id' , '4')
                ->get();

            return $consultas;
        }
        public function consultasEmConfirmacao($cpf)
        {
            $prontuario = Prontuario::where('pacientes_pessoa_pessoa_cpf' , $cpf)->first();

            $consultas = $prontuario->consultas()
                ->where('consulta_status_status_id' , '1')
                ->get();

            return $consultas;
        }

        public function comorbidade($id)
        {
            $consultas = Prontuario::Where([
			
				['prontuario_cod', $id],
				['prontuario_D_E_L_E_T_', '=',''],
				
				['comorbidades_D_E_L_E_T_', '=',''],
				//['alergia_D_E_L_E_T_', '=',''],
				//['cirurgia_D_E_L_E_T_', '=',''],
				//['hisFam_D_E_L_E_T_', '=',''],
				//['dst_D_E_L_E_T_', '=',''],
			])
			
			->join('comorbidades', 'comorbidades.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('alergias', 'alergias.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('cirurgias', 'cirurgias.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('historicoFamiliarDoencas', 'historicoFamiliarDoencas.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('dst', 'dst.prontuarios_prontuario_cod', '=' , 'prontuario_cod')            
            ->get();

            return $consultas;
        }
        public function alergias($id)
        {
            $consultas = Prontuario::Where([
			
				['prontuario_cod', $id],
				['prontuario_D_E_L_E_T_', '=',''],
				
				['alergia_D_E_L_E_T_', '=',''],
				//['alergia_D_E_L_E_T_', '=',''],
				//['cirurgia_D_E_L_E_T_', '=',''],
				//['hisFam_D_E_L_E_T_', '=',''],
				//['dst_D_E_L_E_T_', '=',''],
			])
			
			->join('alergias', 'alergias.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('alergias', 'alergias.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('cirurgias', 'cirurgias.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('historicoFamiliarDoencas', 'historicoFamiliarDoencas.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('dst', 'dst.prontuarios_prontuario_cod', '=' , 'prontuario_cod')            
            ->get();

            return $consultas;
        }
        public function medControl($id)
        {
            $consultas = Prontuario::Where([
			
				['prontuario_cod', $id],
				['prontuario_D_E_L_E_T_', '=',''],
				
				['medicamento_controlado_D_E_L_E_T_', '=',''],
				//['alergia_D_E_L_E_T_', '=',''],
				//['cirurgia_D_E_L_E_T_', '=',''],
				//['hisFam_D_E_L_E_T_', '=',''],
				//['dst_D_E_L_E_T_', '=',''],
			])
			
			->join('medicamento_controlado', 'medicamento_controlado.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('alergias', 'alergias.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('cirurgias', 'cirurgias.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('historicoFamiliarDoencas', 'historicoFamiliarDoencas.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('dst', 'dst.prontuarios_prontuario_cod', '=' , 'prontuario_cod')            
            ->get();

            return $consultas;
        }
        public function dst($id)
        {
            $consultas = Prontuario::Where([
			
				['prontuario_cod', $id],
				['prontuario_D_E_L_E_T_', '=',''],
				
				['dst_D_E_L_E_T_', '=',''],
				//['alergia_D_E_L_E_T_', '=',''],
				//['cirurgia_D_E_L_E_T_', '=',''],
				//['hisFam_D_E_L_E_T_', '=',''],
				//['dst_D_E_L_E_T_', '=',''],
			])
			
			->join('dst', 'dst.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('alergias', 'alergias.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('cirurgias', 'cirurgias.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('historicoFamiliarDoencas', 'historicoFamiliarDoencas.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('dst', 'dst.prontuarios_prontuario_cod', '=' , 'prontuario_cod')            
            ->get();

            return $consultas;
        }
        public function DoencaFam($id)
        {
            $consultas = Prontuario::Where([
			
				['prontuario_cod', $id],
				['prontuario_D_E_L_E_T_', '=',''],
				
				['hisFam_D_E_L_E_T_', '=',''],
				//['alergia_D_E_L_E_T_', '=',''],
				//['cirurgia_D_E_L_E_T_', '=',''],
				//['hisFam_D_E_L_E_T_', '=',''],
				//['dst_D_E_L_E_T_', '=',''],
			])
			
			->join('historicoFamiliarDoencas', 'historicoFamiliarDoencas.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('alergias', 'alergias.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('cirurgias', 'cirurgias.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('historicoFamiliarDoencas', 'historicoFamiliarDoencas.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('dst', 'dst.prontuarios_prontuario_cod', '=' , 'prontuario_cod')            
            ->get();

            return $consultas;
        }
        public function cirurgia($id)
        {
            $consultas = Prontuario::Where([
			
				['prontuario_cod', $id],
				['prontuario_D_E_L_E_T_', '=',''],
				
				['cirurgia_D_E_L_E_T_', '=',''],
				//['alergia_D_E_L_E_T_', '=',''],
				//['cirurgia_D_E_L_E_T_', '=',''],
				//['hisFam_D_E_L_E_T_', '=',''],
				//['dst_D_E_L_E_T_', '=',''],
			])
			
			->join('cirurgias', 'cirurgias.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('alergias', 'alergias.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('cirurgias', 'cirurgias.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('historicoFamiliarDoencas', 'historicoFamiliarDoencas.prontuarios_prontuario_cod', '=' , 'prontuario_cod')
			//->join('dst', 'dst.prontuarios_prontuario_cod', '=' , 'prontuario_cod')            
            ->get();

            return $consultas;
        }

        

    }