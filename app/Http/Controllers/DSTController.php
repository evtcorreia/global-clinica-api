<?php



    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class DSTController extends Controller
    {
        public function store(Request $request)
        {
            DB::table('dst')->insert(
                [
                    'dst_desc' => $request->dst_desc,
                    'prontuarios_prontuario_cod' =>  $request->prontuarios_prontuario_cod
                ]



                );
        }
    }