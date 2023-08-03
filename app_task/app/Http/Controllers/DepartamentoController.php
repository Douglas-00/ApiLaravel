<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{   
    public function __construct(Departamento $departamento){
        $this->departamento = $departamento;
    }

    //Exibindo Todos Departamentos
    public function index()
    {   
        $departamentos = $this->departamento->all();
        return response()->json($departamentos, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {   
        $departamento = $this->departamento->create($request->all());
        return  response()->json($departamento, 201);
    }

    //Exibindo departamento pelo id
    public function show($id)
    {   
        try {

            $departamento = $this->departamento->find($id);
            if($departamento === null){
                return response()->json (['erro' => 'Recurso pesquisado não existe'], 404);
            }else{
                return response()->json($departamento, 200);
            }

        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function edit(Departamento $departamento)
    {
        //
    }

    //Atualizando departamento
    public function update(Request $request, $id)
    {   
        try {
            
            $departamento = $this->departamento->find($id);
            if($departamento === null){
                return response()->json(['erro' => 'Impossivel realizar a atualização, O recurso solicitado não existe.'], 404);
            }else{
                $departamento->update($request->all());

                return response()->json($departamento, 200);
            }
            
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    //Deletando departamento pelo id
    public function destroy($id)
    {   
        try {

            $departamento = $this->departamento->find($id);
            if($departamento === null){
                return response()->json(['erro' => 'Impossivel realizar a exclusão, O recurso solicitado não existe.'], 404);
            }else{
                $departamento->delete();

                return response()->json(['msg' =>'O Departamento foi removido com sucesso!!'], 200);
            }

            
        } catch (\Throwable $th) {
            throw $th;
        }
        
        
    }
}
