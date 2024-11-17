<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Http\Request;

class DespesaController extends Controller
{
    public function index()
    {
        return Despesa::with(['conta', 'categoria'])->get();
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

        $despesa = Despesa::create($request->all());
        return response()->json($despesa, 201);
    }

    public function show($id)
    {
        return Despesa::with(['conta', 'categoria'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $despesa = Despesa::findOrFail($id);

        $request->validate([
            'id_conta' => 'required|exists:contas,id_conta',
            'id_categoria' => 'required|exists:categorias,id_categoria',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        $despesa->update($request->all());
        return response()->json($despesa, 200);
    }

    public function destroy($id)
    {
        $despesa = Despesa::findOrFail($id);
        $despesa->delete();
        return response()->json(null, 204);
    }
}
