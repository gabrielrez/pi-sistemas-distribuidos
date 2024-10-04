<?php

use Hefestos\Database\Tabela;

return (new Tabela('despesa'))
    ->id()
    ->int('id_usuario')
    ->int('id_categoria')
    ->int('valor')
    ->string('descricao')
    ->date('data')
    ->foreignKey('id_usuario', 'usuario', 'id')
    ->foreignKey('id_categoria', 'categoria', 'id');
