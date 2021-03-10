<?php

namespace App\Http\Controllers;
use App\Receita;



    class ReceitasController
    {
        public function show($id)
        {
            $receitas = Receita::where('id', $id)->first();

            $medicamentos = $receitas->medicamentos()->get();

            return $medicamentos;

        }
    }