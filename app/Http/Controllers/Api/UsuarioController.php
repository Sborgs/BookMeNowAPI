<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        try {
            return response()->json($usuarios, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao lista os dados"], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $usuario = User::findOrFail($id);
            return response()->json($usuario, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Usuário não encontrado"], 404);
        }
    }


    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            'email' => 'required|string|email|unique:usuarios',
            'password' => 'required|min:8|confirmed'
        ]);

        try {

            $data = [
                'nome' => $request->nome,
                'email' => $request->email,
                'password' => $request->password,
            ];

            $usuario = User::create($data);

            return response()->json($usuario, 201);      

        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao criar usuário"], 500);
        }
    }


    public function update(Request $request, string $id)
    {

     

        $request->validate([
            'nome' => 'required',
            'email' => 'required|string|email|unique:usuarios',
            'password' => 'required|min:8|confirmed'
        ]);

       

        try {

        $usuario = User::findOrFail($id);

        $request->validate([
            'nome' => 'required',
            'email' => 'required|string|email|unique:usuarios',
            'password' => 'required|min:8|confirmed'
        ]);

        $usuario->update($data);

        return response()->json($usuario, 200);
        
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao atualizar usuário"], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $usuario = User::findOrFail($id);
            $usuario->delete();
           return response()->json(["message"=>"Usuário deletado com sucesso"], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Erro ao deletar o usuário"], 200);
        }
    }
}
