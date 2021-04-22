<?php
namespace App\Http\Controllers;

use App\Estado;
use App\Endereco;


    class EstadosController
    {
        public function all()
        {

            return Estado::all();

        }

        public function buscaEstado($id)
        {
            $endereco = Endereco::where('endereco_id', $id)->first();

            $estado = $endereco->estado()->first();

            return $estado;
        }
    }