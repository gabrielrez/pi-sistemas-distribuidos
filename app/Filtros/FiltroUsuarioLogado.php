<?php

namespace App\Filtros;

class FiltroUsuarioLogado
{
    /**
     * Aplica o filtro configurado
     */
    public function aplicar()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['id']);

        if (!$usuarioLogado()) {
            return redirecionar('/login')->com('feedback', 'Você precisa estar logado para acessar essa página.');
        }
    }
}
