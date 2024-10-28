//testando
<h1>Dashboard</h1>
<p>Olá, <?= $usuario['nome'] ?> 👋</p>
<a href="/logout">Sair da conta</a>

<br>
<br>
<br>

<a href="/receitas/novo">Adicionar Receita</a>
<br>
<br>
<a href="/despesas/novo">Adicionar Despesa</a>
<br>
<br>
<a href="/metas/novo">Adicionar Meta</a>

<br>
<br>

<hr>

<div class="total">
    <h3>Total</h3>
    <?= number_format(28000 / 100, 2, ',', '.') . ' R$'; ?>
</div>

<br>

<hr>

<div class="container" style="display: flex; gap: 120px;">
    <div class="receitas">
        <h3>Suas Receitas</h3>
        <a href="/receitas">Ver todas</a>
    </div>

    <div class="despesas">
        <h3>Suas Despesas</h3>
        <a href="/despesas">Ver todas</a>
    </div>

    <div class="metas">
        <h3>Minhas Metas</h3>
        <a href="/metas">Ver metas</a>
    </div>
</div>
