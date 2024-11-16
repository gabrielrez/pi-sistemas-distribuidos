<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use App\Models\Despesa;

class DashboardController extends Controller
{
    protected $receitasModel;
    protected $despesasModel;

    public function __construct(Receita $receita, Despesa $despesa)
    {
        $this->receitasModel = $receita;
        $this->despesasModel = $despesa;
    }

    public function index()
    {
        $idUsuario = auth()->id();

        [$receitas, $ultimasReceitas, $totalReceitas] = $this->receitasModel->resumoReceitas($idUsuario);
        [$despesas, $ultimasDespesas, $totalDespesas] = $this->despesasModel->resumoDespesas($idUsuario);

        return view('dashboard', [
            'receitas' => $receitas,
            'ultimas_receitas' => $ultimasReceitas,
            'total_receitas' => $totalReceitas,
            'despesas' => $despesas,
            'ultimas_despesas' => $ultimasDespesas,
            'total_despesas' => $totalDespesas
        ]);
    }
}
