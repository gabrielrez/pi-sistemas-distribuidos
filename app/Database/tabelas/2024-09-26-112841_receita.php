<?php

use Hefestos\Database\Tabela;

return (new Tabela('receita'))
    ->id()
    ->int('id_usuario')
    ->string('categoria')
    ->int('valor')
    ->string('descricao')
    ->date('data')
    ->foreignKey('id_usuario', 'usuario', 'id');
