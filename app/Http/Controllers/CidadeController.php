<?php
namespace App\Http\Controllers;

use App\Cidade;
use App\Endereco;


    class CidadeController
    {
        public function all()
        {

            return Cidade::all();

        }

        public function cidade($id)
        {
            

            $cidade = Cidade::where('estados_estado_id', $id)->get();


            return $cidade;

        }

        public function buscaCidade($id)
        {

            
            $endereco = Cidade::where('id', $id)->first();

           // $cidade = $endereco->cidade()->first();

            return $endereco;
        }
		
		
    }