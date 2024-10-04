<?php

namespace App\Controllers;

use Hefestos\Core\Controller;
use app\Models\Despesa;

class DespesaController extends Controller
{
    protected $despesa_model;

    public function __construct()
    {
        $this->despesa_model = new Despesa();
    }
    
    public function index()
    {
        $despesas = $this->despesa_model->todos();
        
        return view('despesas/despesas', [
            'despesas' => $despesas
        ]);
    }

    public function create(){
        return view('despesas/novo');
    }

    public function store(){
        return redirecionar('/');
    }
}