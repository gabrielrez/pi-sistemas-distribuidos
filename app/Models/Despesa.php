<?php

namespace App\Models;

use Hefestos\Core\Model;

class Despesa extends Model
{
    // tabela do banco de dados ao qual o model está relacionado
    protected string $tabela = 'despesa';

    public function resumoDespesas()
    {
        $despesas = $this->where(['id_usuario' => sessao()->pegar('usuario.id')])->todos();
        $total = array_sum(array_column($despesas, 'valor'));

        return [$despesas, $total];
    }
}
