<?php

namespace App\Controllers;

use Hefestos\Core\Controller;
use app\Models\Receita;

class ReceitaController extends Controller
{
    protected $receita_model;

    public function __construct()
    {
        $this->receita_model = new Receita();
    }

    public function index()
    {
        $receitas = $this->receita_model->where(['id_usuario' => $_SESSION['id']])->todos();

        return view('receitas/receitas', [
            'receitas' => $receitas
        ]);
    }

    public function create()
    {
        return view('receitas/novo');
    }

    public function store()
    {
        $receita = $this->dadosPost();
        $this->receita_model->insert($receita);
        return redirecionar('/');
    }
}
