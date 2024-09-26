<?php

use Hefestos\Database\Tabela;

return (new Tabela('conta'))
    ->id()
    ->int('id_usuario')
    ->int('saldo_inicial')
    ->int('saldo_atual')
    ->int('tipo_conta')
    ->foreignKey('id_usuario', 'usuario', 'id');
