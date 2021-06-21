<?php

namespace App\Http\Controllers;

use App\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MedicamentosController extends Controller
{
    public function all()
    {
        
        $medicamentos =  DB::table('medicamentos')
        ->orderBy('medicamento_nome')
        ->get();

        return $medicamentos;
    }

    public function medControlStore(Request $request)
    {

       
        DB::table('medicamento_controlado')->insert(
            [
                'medControl_desc' => $request->medControl_desc,
                'prontuarios_prontuario_cod' =>  $request->prontuarios_prontuario_cod
            ]



            );
    }
}