<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ReceitaController extends Controller
{
    public function index(): JsonResponse
    {
        $receitas = Receita::with(['conta', 'categoria'])->get();
        return response()->json($receitas);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'id_conta' => 'required|exists:contas,id_conta',
            'id_categoria' => 'required|exists:categorias,id_categoria',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        $receita = Receita::create($validatedData);
        return response()->json($receita, 201);
    }

    public function show($id): JsonResponse
    {
        $receita = Receita::with(['conta', 'categoria'])->find($id);

        if (!$receita) {
            return response()->json(['message' => 'Receita não encontrada'], 404);
        }

        return response()->json($receita);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $receita = Receita::find($id);

        if (!$receita) {
            return response()->json(['message' => 'Receita não encontrada'], 404);
        }

        $validatedData = $request->validate([
            'id_conta' => 'required|exists:contas,id_conta',
            'id_categoria' => 'required|exists:categorias,id_categoria',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        $receita->fill($validatedData);
        $receita->save();

        return response()->json($receita, 200);
    }

    public function destroy($id): JsonResponse
    {
        $receita = Receita::find($id);

        if (!$receita) {
            return response()->json(['message' => 'Receita não encontrada'], 404);
        }

        $receita->delete();
        return response()->json(null, 204);
    }
}
