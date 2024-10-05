<?php

namespace App\Controllers;

use Hefestos\Core\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $usuario = $_SESSION;

        return view('dashboard', [
            'usuario' => $usuario,
            'total' => 10000,
            'receitas' => ['receita 1', 'receita 2'],
            'despesas' => ['despesa 1', 'despesa 2'],
        ]);
    }
}
