<?= comp('head') ?>

<body>
    <main class="container-lp">
        <div class="info">
            <h1>Gestão <br> Financeira<span class="detalhe">.</span> </h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem praesentium necessitatibus tenetur corporis ipsa similique, libero, eveniet alias quas fugit, nam quo quis placeat ad eligendi itaque natus enim minus.</p>
            <div class="btns">
                <a class="entrar" href="/login">Entrar</a>
                <a class="criar-conta" href="/cadastro">Criar Conta</a>
            </div>
        </div>
        <img class="lp-img" src="<?= url_base('images/lp-img.svg') ?>" alt="Aplicativo de finanças pessoais">
    </main>
</body>

</html>

<style>
    body {
        width: 100vw;
        height: 100vh;
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .lp-img{
        max-width: 100%;
    }

    main h1 {
        font-weight: 700;
        font-size: 4.5rem;
        line-height: 5rem;
    }

    main p {
        max-width: 80vh;
        font-weight: 400;
        font-size: 1rem;
        line-height: 1.75rem;
        margin-top: 40px;
    }

    .container-lp {
        max-width: 75%;
        margin-left: auto;
        margin-right: auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        gap: 40px;
    }

    .btns {
        margin-top: 32px;
        display: flex;
        gap: 16px;
    }

    .btns a {
        padding: 12px 32px;
        border-radius: 8px;
        text-decoration: none;
        color: #0a190c;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .btns a:hover {
        transform: translateY(-4px);
    }

    .info .entrar {
        background-color: #748fc8;
    }

    .info .entrar:hover {
        box-shadow: rgba(116, 143, 200, 0.25) 0px 48px 100px 0px;
    }

    .info .criar-conta {
        background-color: #49b759;
    }

    .info .criar-conta:hover {
        box-shadow: rgba(73, 183, 89, 0.25) 0px 48px 100px 0px;
    }
</style>