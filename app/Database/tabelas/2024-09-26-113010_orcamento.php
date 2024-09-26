<?php

use Hefestos\Database\Tabela;

return (new Tabela('orcamento'))
    ->id()
    ->int('id_usuario')
    ->int('id_categoria')
    ->int('valor_planejado')
    ->date('data_inicio')
    ->date('data_fim')
    ->foreignKey('id_usuario', 'usuario', 'id')
    ->foreignKey('id_categoria', 'usuario', 'id');
