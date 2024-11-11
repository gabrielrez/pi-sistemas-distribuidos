<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Meta;

class MetaController extends Controller
{
    
    public function index()
    {
        return Meta::all();
    }

    
    public function store(Request $request)
    {
        $meta = Meta::create($request->all());
        return response()->json($meta, 201);
    }

    
    public function show($id)
    {
        return Meta::findOrFail($id);
    }

    
    public function update(Request $request, $id)
    {
        $meta = Meta::findOrFail($id);
        $meta->update($request->all());
        return response()->json($meta, 200);
    }

    
    public function destroy($id)
    {
        Meta::destroy($id);
        return response()->json(null, 204);
    }
}
