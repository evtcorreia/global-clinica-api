<?php



    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class ComorbidadesController extends Controller
    {
        public function store(Request $request)
        {
            DB::table('comorbidades')->insert(
                [
                    'comorbidade_desc' => $request->comorbidade_desc,
                    'prontuarios_prontuario_cod' =>  $request->prontuarios_prontuario_cod
                ]



                );
        }
    }