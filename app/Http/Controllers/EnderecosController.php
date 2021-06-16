<?php



    namespace App\Http\Controllers;

	use App\Endereco;
    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;


    class EnderecosController extends Controller
    {
        public function show($id)
        {
            
        }
		
		public function editaBairro(Request $request)
		{
		
			DB::table('enderecos')
			->where('endereco_id', $request->endereco_id )
			
			->update(
            [
				
                'endereco_bairro' => $request->endereco_bairro,
				
                
            ]);
		}
		
		public function editaEstado(Request $request)
		{
		
			DB::table('enderecos')
			->where('endereco_id', $request->endereco_id )
			->update(
            [
				
                'estados_estado_id' => $request->estados_estado_id,
				
				
                
            ]);
		}
		
		public function editaCidade(Request $request)
		{
		
			DB::table('enderecos')
			->where('endereco_id', $request->endereco_id )
			->update(
            [
				
                'cidades_cidade_id' => $request->cidades_cidade_id,
				
				
                
            ]);
		}
		public function editaRua(Request $request)
		{
		
			DB::table('enderecos')
			->where('endereco_id', $request->endereco_id )
			->update(
            [
				
                'endereco_logradouro' => $request->endereco_logradouro,
				
				
                
            ]);
		}
		
		public function editaCep(Request $request)
		{
		
			DB::table('enderecos')
			->where('endereco_id', $request->endereco_id )
			->update(
            [
				
                'endereco_cep' => $request->endereco_cep,
				
				
                
            ]);
		}
    }