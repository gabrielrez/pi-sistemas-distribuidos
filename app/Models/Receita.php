<?php

namespace App\Models;

use Hefestos\Core\Model;

class Receita extends Model
{
    // tabela do banco de dados ao qual o model está relacionado
    protected string $tabela = 'receita';

    public function resumoReceitas($usuario_id)
    {
        $receitas = $this->where(['id_usuario' => $usuario_id])->todos();
        $ultimas_receitas = array_slice($receitas, -3);
        $total = array_sum(array_column($receitas, 'valor'));

        return [$receitas, $ultimas_receitas, $total];
    }
}
