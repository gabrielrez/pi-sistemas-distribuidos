<?php

namespace App\Controllers;

use Hefestos\Core\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $usuario = $_SESSION;

        return view('dashboard', [
            'usuario' => $usuario
        ]);
    }
}
