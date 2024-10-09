<?= comp('head') ?>

<div class="container">
    <header>
        <h1>Dashboard</h1>
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

        <div class="total">
            <h3 class="total-titulo">Total</h3>
            <span class="total-valor"><?= ($total_receitas - $total_despesas) . ' R$'; ?></span>
        </div>

        <div class="opcoes">
            <div class="receitas">
                <h3>Suas Receitas</h3>
                <?php foreach ($ultimas_receitas as $receita): ?>
                    <ul>
                        <li>
                            <h4><?= $receita['categoria'] ?></h4>
                            <p><?= $receita['valor'] . ' R$' ?></p>
                        </li>
                    </ul>
                <?php endforeach; ?>
                <a href="/receitas">Ver todas</a>
            </div>

            <div class="despesas">
                <h3>Suas Despesas</h3>
                <?php foreach ($ultimas_despesas as $despesa): ?>
                    <ul>
                        <li>
                            <h4><?= $despesa['categoria'] ?></h4>
                            <p><?= $despesa['valor'] . ' R$' ?></p>
                        </li>
                    </ul>
                <?php endforeach; ?>
                <a href="/despesas">Ver todas</a>
            </div>

            <div class="metas">
                <h3>Minhas Metas</h3>
                <a href="/metas">Ver metas</a>
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
        justify-content: space-between;
        gap: 32px;
    }

    .opcoes h3 {
        font-size: 1.5rem;
        color: #748FC8;
        margin-bottom: 16px;
    }

    .opcoes ul {
        margin-top: 16px;
    }

    .opcoes a {
        margin-top: 16px;
    }
</style>