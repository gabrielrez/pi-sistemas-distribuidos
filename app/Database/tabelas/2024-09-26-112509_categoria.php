<?php

use Hefestos\Database\Tabela;

return (new Tabela('categoria'))
    ->id()
    ->string('nome')
    ->int('tipo');
