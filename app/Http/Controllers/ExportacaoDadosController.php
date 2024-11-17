<?php

namespace App\Http\Controllers;

use App\Models\ExportacaoDados;
use Illuminate\Http\Request;

class ExportacaoDadosController extends Controller
{
    public function index()
    {
        return ExportacaoDados::with('user')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_users' => 'required|exists:users,id',
            'formato' => 'required|in:CSV,PDF',
            'conteudo' => 'nullable|string',
        ]);

        $exportacaoDados = ExportacaoDados::create([
            'id_users' => $request->id_users,
            'formato' => $request->formato,
            'conteudo' => $request->conteudo,
        ]);

        return response()->json($exportacaoDados, 201);
    }

    public function show($id)
    {
        return ExportacaoDados::with('user')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $exportacaoDados = ExportacaoDados::findOrFail($id);

        $request->validate([
            'id_users' => 'required|exists:users,id',
            'formato' => 'required|in:CSV,PDF',
            'conteudo' => 'nullable|string',
        ]);

        $exportacaoDados->update([
            'id_users' => $request->id_users,
            'formato' => $request->formato,
            'conteudo' => $request->conteudo,
        ]);

        return response()->json($exportacaoDados, 200);
    }

    public function destroy($id)
    {
        $exportacaoDados = ExportacaoDados::findOrFail($id);
        $exportacaoDados->delete();
        return response()->json(null, 204);
    }
}
