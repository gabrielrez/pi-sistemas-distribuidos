<?php

namespace App\Models;

use Hefestos\Core\Model;

class Receita extends Model
{
    // tabela do banco de dados ao qual o model está relacionado
    protected string $tabela = 'receita';

    public function resumoReceitas()
    {
        $receitas = $this->where(['id_usuario' => sessao()->pegar('usuario.id')])->todos();
        $total = array_sum(array_column($receitas, 'valor'));

        return [$receitas, $total];
    }
}
