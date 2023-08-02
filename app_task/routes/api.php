<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Criando Rotas Api

Route::apiresource('departamento','App\Http\Controllers\DepartamentoController');
Route::apiresource('funcionario','App\Http\Controllers\FuncionarioController');
Route::apiresource('tarefa','App\Http\Controllers\TarefaController');

