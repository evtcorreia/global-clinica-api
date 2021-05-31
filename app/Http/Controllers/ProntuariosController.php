<?php

    namespace App\Http\Controllers;

use App\Prontuario;

Class ProntuariosController
    {
        public function show($cpf)
        {
            $prontuario = Prontuario::where('pacientes_pessoa_pessoa_cpf' , $cpf)->first();

            $consultas = $prontuario->consultas()
            ->join('prontuarios', 'prontuarios_prontuario_cod', '=' , 'prontuario_cod')
            ->join('pacientes', 'pacientes_pessoa_pessoa_cpf', '=', 'pessoa_pessoa_cpf')
            ->join('pessoas', 'pessoa_cpf','=', 'pessoa_pessoa_cpf')
            ->get();

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
    }