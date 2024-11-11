<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MetaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $goals = Goal::where('user_id', $user->id)->get();

        return view('goals.index', [
            'goals' => $goals
        ]);
    }

    public function create()
    {
        return view('goals.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'target_amount' => 'required|numeric',
            'target_date' => 'required|date',
        ]);

        $goal = new Goal();
        $goal->user_id = Auth::id();
        $goal->name = $validatedData['name'];
        $goal->description = $validatedData['description'];
        $goal->target_amount = $validatedData['target_amount'];
        $goal->target_date = $validatedData['target_date'];
        $goal->save();

        return redirect()->route('dashboard');
    }
}