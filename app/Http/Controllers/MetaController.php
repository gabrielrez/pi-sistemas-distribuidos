<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meta;
use Illuminate\Support\Facades\Validator;

class MetaController extends Controller
{
    public function index()
    {
        return Meta::all();
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'id_users' => 'required|exists:users,id',
            'descricao' => 'required|string|max:255',
            'valor_alvo' => 'required|numeric|min:0',
            'data_meta' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        
        try {
            $meta = Meta::create([
                'descricao' => $request->descricao,
                'valor_alvo' => $request->valor_alvo,
                'data_meta' => $request->data_meta,
                'id_users' => $request->id_users,
            ]);
            return response()->json($meta, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        
    }

    public function show($id)
    {
        $meta = Meta::find($id);

        if (!$meta) {
            return response()->json(['error' => 'Meta não encontrada'], 404);
        }

        return response()->json($meta);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'descricao' => 'nullable|string|max:255',
            'valor_alvo' => 'nullable|numeric|min:0',
            'data_meta' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $meta = Meta::findOrFail($id);
        $meta->update($request->all());

        return response()->json($meta, 200);
    }

    public function destroy($id)
    {
        $meta = Meta::find($id);

        if (!$meta) {
            return response()->json(['error' => 'Meta não encontrada'], 404);
        }

        $meta->delete();
        return response()->json(null, 204);
    }
}
