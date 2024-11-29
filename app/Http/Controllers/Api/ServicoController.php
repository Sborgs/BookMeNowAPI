<?php

namespace App\Http\Controllers\Api;

use App\Models\Foto;
use App\Models\Servico;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicoController extends Controller
{
    public function index()
    {
        $servicos = Servico::all();
        try {
            return response()->json($servicos, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao listar os dados"], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $servico = Servico::findOrFail($id);
            return response()->json($servico, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Serviço não encontrado"], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'=> 'required|string|max:100',
            'descricao'=> 'required',
            'valor'=> 'required|numeric',
            'celular'=> 'required|string|max:20',
            'endereco'=> 'required',
            'numero'=> 'required',
            'bairro'=> 'required',
            'cidade'=>'required',
            'estado'=> 'required',
            'cep'=> 'required',
            'usuario_id'=> 'required',
            'categoria_id'=> 'required'

        ]);

        try {

            $data = [
                'titulo'=> $request->titulo,
                'descricao'=> $request->descricao,
                'valor'=> $request->valor,
                'celular'=> $request->celular,
                'endereco'=> $request->endereco,
                'numero'=> $request->numero,
                'bairro'=> $request->bairro,
                'cidade'=> $request->cidade,
                'estado'=> $request->estado,
                'cep'=> $request->cep,
                'usuario_id'=> $request->usuario_id,
                'categoria_id'=> $request->categoria_id,
            ];
            if ($request->hasFile('foto')) {
                $caminhoFoto = $request->file('foto')->store('servicos', 'public');
                $data['foto'] = "/storage/" . $caminhoFoto; // salva o caminho da foto
            }

            $servico = Servico::create($data);

            return response()->json($servico, 201);
        
        } catch (Exception $e){
            return response()->json(["Erro" => "Erro ao criar serviço"], 500);
        }
    }

    public function update(Request $request, string $id)
    {

        $request->validate(([
            'titulo'=> 'required|string|max:100',
            'descricao'=> 'required',
            'valor'=> 'required|numeric',
            'celular'=> 'required|string|max:20',
            'endereco'=> 'required',
            'numero'=> 'required',
            'bairro'=> 'required',
            'cidade'=>'required',
            'estado'=> 'required',
            'cep'=> 'required',
            'usuario_id'=> 'required',
            'categoria_id'=> 'required'
        ]));

        try {

            $servico = Servico::findOrFail($id);

            $data = [
                'titulo'=> $request->titulo,
                'descricao'=> $request->descricao,
                'valor'=> $request->valor,
                'celular'=> $request->celular,
                'endereco'=> $request->endereco,
                'numero'=> $request->numero,
                'bairro'=> $request->bairro,
                'cidade'=> $request->cidade,
                'estado'=> $request->estado,
                'cep'=> $request->cep,
                'usuario_id'=> $request->usuario_id,
                'categoria_id'=> $request->categoria_id,
            ];

            if ($request->hasFile('foto')) {
                // apaga a imagem antiga, se existir
                if ($servico->foto) {
                    Storage::disk('public')->delete($servico->foto);
                }

                $caminhoFoto =$request->file('foto')->store('servicos', 'public');
                $data['foto'] = "/storage/" . $caminhoFoto; // Salva o novo caminho da foto
            }

            $servico->update($data);

            return response()->json($servico, 200);
                
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao atualizar serviço"], 500);
        }
    }

    public function destroy(String $id) 
    {
        try {
            $servico = Servico::findOrfail($id);
            $servico->delete();
            return response()->json(["message"=>"Serviço deletado com sucesso"], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Erro ao deletar o serviço"], 200);
        }
    }
}
