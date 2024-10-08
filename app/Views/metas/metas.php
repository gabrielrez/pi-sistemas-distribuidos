<h1>Metas</h1>

<a href="/dashboard">Voltar</a>
<br>
<br>
<a href="/metas/novo">Adicionar Meta</a>

<br>
<br>

<?php

foreach ($metas as $meta) {
    echo '<ul>';
    echo '<li>' . 'Valor: ' . $meta['valor_alvo'] . '</li>';
    echo '<li>' . 'Descrição: ' . $meta['descricao'] . '</li>';
    echo '<li>' . 'Data estimada: ' . $meta['data_meta'] . '</li>';
    echo '</ul>';
}

?>