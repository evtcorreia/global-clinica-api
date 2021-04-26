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
    }