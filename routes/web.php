<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\PessoasController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});



$router->group(['prefix' => '/api'], function() use($router){
    
    $router->get('/pessoas','PessoasController@index');
    $router->get('/pessoa/{cpf}','PessoasController@buscaPorCpf');

    $router->get('/paciente/{cpf}', 'PacientesController@show');

    $router->get('/exame/{id}', 'ExameController@show');

    $router->get('/prontuario/{cpf}', 'ProntuariosController@show');
    $router->get('/prontuario/consulta-aberta/{cpf}', 'ProntuariosController@consultasAbertas');

    $router->get('/receita/{id}', 'ReceitasController@show');

    $router->get('/consulta/{id}', 'ConsultasController@show');
    $router->post('/consulta', 'ConsultasController@store');

    $router->get('telefone/{cpf}', 'PessoasController@buscaTelefones');
    $router->get('/endereco/{cpf}', 'PessoasController@buscaEnderecos');
    $router->get('/estados','EstadosController@all');
    $router->get('/estado/busca/{id}','EstadosController@buscaEstado');
    $router->get('/cidades','CidadeController@all');
    $router->get('/cidade/busca/{id}','CidadeController@buscaCidade');
    $router->get('/cidades/{id}','CidadeController@cidade');
    $router->get('/clinicas/cidade/{id}', 'ClinicasController@show');
    //$router->get('/clinicas/medicos/{id}', 'ClinicasController@especialidades');
    $router->get('/clinicas/especialidades/{id}', 'ClinicasController@especialidades');
    $router->get('/clinicas/medicos/especialidade/{id}', 'EspecialidadesController@medicos');
    
});