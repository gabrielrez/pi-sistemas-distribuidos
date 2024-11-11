<?php

namespace App\Http\Controllers;

use App\Models\ConfiguracoesUsuario;
use Illuminate\Http\Request;

class ConfiguracoesUsuarioController extends Controller
{
    public function index()
    {
        return ConfiguracoesUsuario::with('user')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_users' => 'required|exists:users,id',
            'preferencias' => 'nullable|json',
        ]);

        $configuracoesUsuario = ConfiguracoesUsuario::create([
            'id_users' => $request->id_users,
            'preferencias' => $request->preferencias
        ]);

        return response()->json($configuracoesUsuario, 201);
    }

    public function show($id)
    {
        try {
            return ConfiguracoesUsuario::with('user')->findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Configuração não encontrada.'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $configuracoesUsuario = ConfiguracoesUsuario::findOrFail($id);

        $request->validate([
            'id_users' => 'required|exists:users,id',
            'preferencias' => 'nullable|json',
        ]);

        $configuracoesUsuario->update([
            'id_users' => $request->id_users,
            'preferencias' => $request->preferencias
        ]);

        return response()->json($configuracoesUsuario, 200);
    }

    public function destroy($id)
    {
        $configuracoesUsuario = ConfiguracoesUsuario::findOrFail($id);
        $configuracoesUsuario->delete();
        return response()->json(null, 204);
    }
}
