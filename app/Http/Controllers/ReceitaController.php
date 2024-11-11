<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use Illuminate\Http\Request;

class ReceitaController extends Controller
{
    public function index()
    {
        return Receita::with(['conta', 'categoria'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_conta' => 'required|exists:contas,id_conta',
            'id_categoria' => 'required|exists:categorias,id_categoria',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        $receita = Receita::create($request->all());
        return response()->json($receita, 201);
    }

    public function show($id)
    {
        return Receita::with(['conta', 'categoria'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $receita = Receita::findOrFail($id);

        $request->validate([
            'id_conta' => 'required|exists:contas,id_conta',
            'id_categoria' => 'required|exists:categorias,id_categoria',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        $receita->update($request->all());
        return response()->json($receita, 200);
    }

    public function destroy($id)
    {
        $receita = Receita::findOrFail($id);
        $receita->delete();
        return response()->json(null, 204);
    }
}
