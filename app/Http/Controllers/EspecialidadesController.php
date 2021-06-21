<?php

namespace App\Http\Controllers;

use App\Especialidade;
use App\Http\Controllers\Controller;

    

    class EspecialidadesController extends Controller
    {
        public function medicos($id)
        {
            $medicos = Especialidade::where('especialidades.id', $id)
            ->join('clinico_especialidade', 'clinico_especialidade.especialidade_id','=','especialidades.id')
            ->join('clinicos','clinicos.id','=','clinico_especialidade.clinico_id')
            ->join('pessoas','pessoas.pessoa_cpf','=','clinicos.pessoa_pessoa_cpf')
            ->get();

            return $medicos;
        }

        public function show()
        {
            return Especialidade::all();
        }
    }