<?php

    namespace App\Http\Controllers;

use App\Prontuario;

Class ProntuariosController
    {
        public function show($cpf)
        {
            $prontuario = Prontuario::where('pacientes_pessoa_pessoa_cpf' , $cpf)->first();

            $consultas = $prontuario->consultas()->get();

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