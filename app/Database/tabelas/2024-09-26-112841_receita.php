<?php

use Hefestos\Database\Tabela;

return (new Tabela('receita'))
    ->id()
    ->int('id_conta')
    ->int('id_categoria')
    ->int('valor')
    ->string('descricao')
    ->date('data')
    ->foreignKey('id_conta', 'conta', 'id')
    ->foreignKey('id_categoria', 'categoria', 'id');
