<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DespesaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $expenses = Expense::where('user_id', $user->id)->get();

        return view('expenses.index', [
            'expenses' => $expenses
        ]);
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $expense = new Expense();
        $expense->user_id = Auth::id();
        $expense->name = $validatedData['name'];
        $expense->amount = $validatedData['amount'];
        $expense->date = $validatedData['date'];
        $expense->save();

        return redirect()->route('dashboard');
    }
}