<?php

namespace App\Filtros;

class FiltroUsuarioLogado
{
    /**
     * Aplica o filtro configurado
     */
    public function aplicar()
    {
        if (!sessao('usuario.id')) {
            return redirecionar('/login')->com('feedback', 'Você precisa estar logado para acessar essa página.');
        }
    }
}
