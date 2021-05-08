<?php  


    namespace App\Http\Controllers;

    use App\Clinica;
    use App\Endereco;

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
    }