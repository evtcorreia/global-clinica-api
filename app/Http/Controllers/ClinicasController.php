<?php  
    namespace App\Http\Controllers;

    use App\Clinica;

    class ClinicasController
    {
        public function show($id)
        {
            $clinica = Clinica::where('id', $id)->first();
            $clinicas = $clinica->cidade()->get();

            return $clinicas;
        }
    }