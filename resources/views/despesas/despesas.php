<!DOCTYPE html>
<html lang="ptbr">

<h1>Despesas</h1>

<a href="/dashboard">Voltar</a>
<br>
<br>
<a href="/despesas/novo">Adicionar Despesa</a>

<br>
<br>

<?php

foreach ($despesas as $despesa) {
    echo '<ul>';
    echo '<li>' . 'Tipo: ' . $despesa['categoria'] . '</li>';
    echo '<li>' . 'Descrição: ' . $despesa['descricao'] . '</li>';
    echo '<li>' . 'Valor: ' . $despesa['valor'] .  ' R$' . '</li>';
    echo '</ul>';
}

?>