<h1>Receitas</h1>

<a href="/dashboard">Voltar</a>
<br>
<br>
<a href="/receitas/novo">Adicionar Receita</a>

<br>
<br>

<?php

foreach ($receitas as $receita) {
    echo '<ul>';
    echo '<li>' . 'Tipo: ' . $receita['categoria'] . '</li>';
    echo '<li>' . 'Descrição: ' . $receita['descricao'] . '</li>';
    echo '<li>' . 'Valor: ' . $receita['valor'] .  ' R$' . '</li>';
    echo '</ul>';
}

?>