<?php

namespace App\Controllers;

use Hefestos\Core\Controller;
use App\Models\Despesa;

class DespesaController extends Controller
{
    protected $despesa_model;

    public function __construct()
    {
        $this->despesa_model = new Despesa();
    }

    public function index()
    {
        $despesas = $this->despesa_model->where(['id_usuario' => sessao()->pegar('usuario.id')])->todos();

        return view('despesas/despesas', [
            'despesas' => $despesas
        ]);
    }

    public function create()
    {
        return view('despesas/novo');
    }

    public function store()
    {
        $despesa = $this->dadosPost();
        $this->despesa_model->insert($despesa);
        return redirecionar('/dashboard');
    }
}
