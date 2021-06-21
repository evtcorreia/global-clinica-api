<?php



    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class CirurgiasController extends Controller
    {
        public function store(Request $request)
        {
            DB::table('cirurgias')->insert(
                [
                    'cirurgia_desc' => $request->cirurgia_desc,
                    'prontuarios_prontuario_cod' =>  $request->prontuarios_prontuario_cod
                ]



                );
        }
    }