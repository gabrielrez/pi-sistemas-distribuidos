<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $incomes = Income::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $total_incomes = Income::where('user_id', $user->id)
            ->sum('amount');

        $expenses = Expense::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $total_expenses = Expense::where('user_id', $user->id)
            ->sum('amount');

        return view('dashboard', [
            'incomes' => $incomes,
            'latest_incomes' => $incomes,
            'total_incomes' => $total_incomes,
            'expenses' => $expenses,
            'latest_expenses' => $expenses,
            'total_expenses' => $total_expenses
        ]);
    }
}