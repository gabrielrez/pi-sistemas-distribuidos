<?php

use Hefestos\Database\Tabela;

return (new Tabela('usuario'))
    ->id()
    ->string('nome')
    ->string('email')
    ->string('senha');
