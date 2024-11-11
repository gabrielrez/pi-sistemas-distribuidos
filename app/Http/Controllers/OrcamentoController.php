<?php

namespace App\Http\Controllers;

use App\Models\Orcamento;
use Illuminate\Http\Request;

class OrcamentoController extends Controller
{
    public function index()
    {
        return Orcamento::with(['user', 'categoria'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_users' => 'required|exists:users,id',
            'id_categoria' => 'required|exists:categorias,id_categoria',
            'valor_planejado' => 'required|numeric',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date',
        ]);

        $orcamento = Orcamento::create($request->all());
        return response()->json($orcamento, 201);
    }

    public function show($id)
    {
        return Orcamento::with(['user', 'categoria'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $orcamento = Orcamento::findOrFail($id);

        $request->validate([
            'id_users' => 'required|exists:users,id',
            'id_categoria' => 'required|exists:categorias,id_categoria',
            'valor_planejado' => 'required|numeric',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date',
        ]);

        $orcamento->update($request->all());
        return response()->json($orcamento, 200);
    }

    public function destroy($id)
    {
        $orcamento = Orcamento::findOrFail($id);
        $orcamento->delete();
        return response()->json(null, 204);
    }
}
