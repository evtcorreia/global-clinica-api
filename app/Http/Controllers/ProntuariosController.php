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
    }