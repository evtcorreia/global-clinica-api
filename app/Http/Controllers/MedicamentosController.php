<?php

namespace App\Http\Controllers;

use App\Medicamento;
use Illuminate\Support\Facades\DB;

class MedicamentosController extends Controller
{
    public function all()
    {
        
        $medicamentos =  DB::table('medicamentos')
        ->orderBy('medicamento_nome')
        ->get();

        return $medicamentos;
    }
}