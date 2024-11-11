<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceitaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $incomes = Income::where('user_id', $user->id)->get();

        return view('incomes.index', [
            'incomes' => $incomes
        ]);
    }

    public function create()
    {
        return view('incomes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $income = new Income();
        $income->user_id = Auth::id();
        $income->name = $validatedData['name'];
        $income->amount = $validatedData['amount'];
        $income->date = $validatedData['date'];
        $income->save();

        return redirect()->route('dashboard');
    }
}