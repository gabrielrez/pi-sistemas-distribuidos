<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function index()
    {
        $contas = Conta::all();
        return response()->json($contas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_users' => 'required|exists:users,id',
            'saldo_inicial' => 'required|numeric|min:0',
            'saldo_atual' => 'required|numeric|min:0',
            'tipo_conta' => 'required|string|max:50',
        ], [
            'saldo_inicial.min' => 'O saldo inicial não pode ser negativo.',
            'saldo_atual.min' => 'O saldo atual não pode ser negativo.',
            'id_users.exists' => 'O usuário especificado não existe.',
        ]);

        $conta = Conta::create($request->all());
        return response()->json($conta, 201);
    }

    public function show($id)
    {
        $conta = Conta::findOrFail($id);
        return response()->json($conta);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'saldo_atual' => 'numeric|min:0',
            'tipo_conta' => 'string|max:50',
        ], [
            'saldo_atual.min' => 'O saldo atual não pode ser negativo.',
        ]);

        $conta = Conta::findOrFail($id);
        $conta->update($request->all());

        return response()->json($conta);
    }

    public function destroy($id)
    {
        $conta = Conta::findOrFail($id);
        $conta->delete();

        return response()->json(null, 204);
    }
}
