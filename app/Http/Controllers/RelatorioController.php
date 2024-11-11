<?php

namespace App\Http\Controllers;

use App\Models\Relatorio;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function index()
    {
        return Relatorio::with('user')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_users' => 'required|exists:users,id',
            'tipo_relatorio' => 'required|in:Despesas,Receitas,Orçamento,Geral',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date',
            'conteudo' => 'nullable|string',
        ]);

        $relatorio = Relatorio::create($request->all());
        return response()->json($relatorio, 201);
    }

    public function show($id)
    {
        return Relatorio::with('user')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $relatorio = Relatorio::findOrFail($id);

        $request->validate([
            'id_users' => 'required|exists:users,id',
            'tipo_relatorio' => 'required|in:Despesas,Receitas,Orçamento,Geral',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date',
            'conteudo' => 'nullable|string',
        ]);

        $relatorio->update($request->all());
        return response()->json($relatorio, 200);
    }

    public function destroy($id)
    {
        $relatorio = Relatorio::findOrFail($id);
        $relatorio->delete();
        return response()->json(null, 204);
    }
}
