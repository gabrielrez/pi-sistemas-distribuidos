<?= comp('head') ?>

<h1>Criar Conta</h1>

<form action="/cadastro" method="POST">
    <div class="input">
        <label for="nome">Nome</label>
        <input type="text" name="nome" placeholder="Seu Nome" required>
    </div>
    <div class="input">
        <label for="email">E-mail</label>
        <input type="email" name="email" placeholder="Seu E-mail" required>
    </div>
    <div class="input">
        <label for="senha">Senha</label>
        <input type="password" name="senha" placeholder="Sua Senha" required>
    </div>

    <button>Criar Conta</button>
    <a href="/login" class="toggle-auth">Já tenho conta</a>
</form>

<style>
    body {
        width: 100vw;
        height: 100vh;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    form {
        margin-top: 40px;
    }

    .input {
        margin-bottom: 16px;
    }

    .input input {
        background-color: #E1EFEE;
        border: none;
        border-radius: 8px;
        display: block;
        margin-top: 8px;
        padding: 16px 8px;
        width: 300px;
    }

    button {
        display: block;
        margin-top: 32px;
        width: 100%;
        padding: 16px;
        border-radius: 8px;
        border: none;
        background-color: #49b759;
        font-family: 'Poppins';
        font-size: 1rem;
        font-weight: 600;
        transition: 0.3s ease;
    }

    button:hover {
        transform: translateY(-4px);
        box-shadow: rgba(73, 183, 89, 0.25) 0px 48px 100px 0px;
    }

    .toggle-auth {
        color: #0a190c;
        text-align: center;
        width: 100%;
        margin: 16px auto;
    }
</style>