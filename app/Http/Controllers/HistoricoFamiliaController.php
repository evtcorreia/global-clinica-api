<?php



    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class HistoricoFamiliaController extends Controller
    {
        public function store(Request $request)
        {
            DB::table('historicoFamiliarDoencas')->insert(
                [
                    'hisFam_desc' => $request->hisFam_desc,
                    'prontuarios_prontuario_cod' =>  $request->prontuarios_prontuario_cod
                ]



                );
        }
    }