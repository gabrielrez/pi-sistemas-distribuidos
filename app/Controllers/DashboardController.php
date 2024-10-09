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
        $id_usuario = sessao()->pegar('usuario.id');

        [$receitas, $ultimas_receitas, $total_receitas] = $this->receitas_model->resumoReceitas($id_usuario);
        [$despesas, $ultimas_despesas, $total_despesas] = $this->despesas_model->resumoDespesas($id_usuario);

        return view('dashboard', [
            'receitas' => $receitas,
            'ultimas_receitas' => $ultimas_receitas,
            'total_receitas' => $total_receitas,
            'despesas' => $despesas,
            'ultimas_despesas' => $ultimas_despesas,
            'total_despesas' => $total_despesas
        ]);
    }
}
