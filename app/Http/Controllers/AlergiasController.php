<?php



    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class AlergiasController extends Controller
    {
        public function store(Request $request)
        {
            DB::table('alergias')->insert(
                [
                    'alergia_desc' => $request->alergia_desc,
                    'prontuarios_prontuario_cod' =>  $request->prontuarios_prontuario_cod
                ]



                );
        }
    }