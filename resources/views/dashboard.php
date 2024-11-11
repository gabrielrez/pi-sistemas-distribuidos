<!doctype html>
<html lang="en">

<div class="container">
    <header>
        <h1>Dashboard<span class="detalhe">.</span></h1>
        <a href="/logout">Sair da conta</a>
    </header>

    <main>
        <p>Olá, <?= sessao()->pegar('usuario.nome') ?> 👋</p>

        <div class="main-links">
            <a href="/receitas/novo">Adicionar Receita</a>
            <a href="/despesas/novo">Adicionar Despesa</a>
            <a href="/metas/novo">Adicionar Meta</a>
        </div>

    </main>

    <div class="info-container">

        <div class="left-container">
            <div class="total">
                <h3 class="total-titulo">Total</h3>
                <span class="total-valor"><?= number_format($total_receitas - $total_despesas, 2, ',', '.') . ' R$'; ?></span>
            </div>
            <div class="metas">
                <h3>Minhas Metas</h3>
                <a href="/metas">Ver metas</a>
            </div>
        </div>

        <div class="opcoes">
            <div class="receitas">
                <h3>Ultimas Receitas</h3>
                <?php foreach ($ultimas_receitas as $receita): ?>
                    <ul>
                        <li>
                            <h4><?= $receita['categoria'] ?></h4>
                            <p><?= number_format($receita['valor'], 2, ',', '.') . ' R$' ?></p>
                        </li>
                    </ul>
                <?php endforeach; ?>
                <a href="/receitas">Ver todas</a>
            </div>

            <div class="despesas">
                <h3>Ultimas Despesas</h3>
                <?php foreach ($ultimas_despesas as $despesa): ?>
                    <ul>
                        <li>
                            <h4><?= $despesa['categoria'] ?></h4>
                            <p><?= number_format($despesa['valor'], 2, ',', '.') . ' R$' ?></p>
                        </li>
                    </ul>
                <?php endforeach; ?>
                <a href="/despesas">Ver todas</a>
            </div>
        </div>

    </div>
</div>

<style>
    header {
        margin-top: 32px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header h1 {
        font-size: 2.5rem;
    }

    a {
        color: #0a190c;
    }

    main {
        margin-top: 60px;
    }

    main p {
        font-size: 1.25rem;
    }

    .main-links {
        margin-top: 32px;
        display: flex;
        gap: 32px;
    }

    .info-container {
        margin-top: 40px;
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 40px;
    }

    .left-container {
        display: flex;
        flex-direction: column;
        gap: 40px;
    }

    .metas {
        background-color: #EAF5F1;
        padding: 24px 32px;
        border-radius: 8px;
    }

    .metas h3 {
        font-size: 1.5rem;
        color: #748FC8;
    }

    .metas a {
        margin-top: 16px;
    }

    .total-titulo {
        color: #49b759;
        font-size: 1.5rem;
    }

    .total-valor {
        display: block;
        margin-top: 16px;
        font-weight: 700;
        font-size: 2rem;
    }

    .total {
        background-color: #D1ECD5;
        padding: 24px 32px;
        border-radius: 8px;
        max-height: 150px;
    }

    .opcoes {
        background-color: #EAF5F1;
        padding: 24px 32px;
        border-radius: 8px;
        display: flex;
        justify-content: space-around;
        gap: 16px;
    }

    .opcoes h3 {
        font-size: 1.5rem;
        color: #748FC8;
        margin-bottom: 16px;
    }

    .opcoes ul {
        margin-top: 16px;
        border-left: 8px solid #748FC8;
        border-radius: 8px;
        padding-left: 8px;
        transition: 0.1s ease;
    }

    .opcoes ul:hover {
        border-left: 12px solid #748FC8;
    }

    .opcoes a {
        margin-top: 16px;
    }
</style>