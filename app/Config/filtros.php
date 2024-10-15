<?php

/* ----------------------------------------------------------------------
Mapeie no array abaixo o nome do filtro que deseja utilizarpara a classe 
que deve ser utilizada nesse filtro (com namespace completo).
---------------------------------------------------------------------- */

use App\Filtros\FiltroUsuarioLogado;

return [
    'logado' => FiltroUsuarioLogado::class,
];
