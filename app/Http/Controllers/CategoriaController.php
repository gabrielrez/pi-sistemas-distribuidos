<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return Categoria::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'tipo' => 'required|in:Despesa,Receita',
        ]);

        $categoria = Categoria::create($request->all());
        return response()->json($categoria, 201);
    }

    public function show($id)
    {
        return Categoria::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        
        $request->validate([
            'nome' => 'string',
            'tipo' => 'in:Despesa,Receita',
        ]);

        $categoria->update($request->all());
        return response()->json($categoria, 200);
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return response()->json(null, 204);
    }
}
