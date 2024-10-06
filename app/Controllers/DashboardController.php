<?php

namespace App\Controllers;

use App\Models\Receita;
use App\Models\Despesa;
use Hefestos\Core\Controller;

class DashboardController extends Controller
{
    protected $receitas_model;
    protected $despesas_model;

    public function __construct()
    {
        $this->receitas_model = new Receita();
        $this->despesas_model = new Despesa();
    }

    public function index()
    {
        [$receitas, $total_receitas] = $this->receitas_model->resumoReceitas();
        [$despesas, $total_despesas] = $this->despesas_model->resumoDespesas();

        return view('dashboard', [
            'receitas' => $receitas,
            'total_receitas' => $total_receitas,
            'despesas' => $despesas,
            'total_despesas' => $total_despesas
        ]);
    }
}
