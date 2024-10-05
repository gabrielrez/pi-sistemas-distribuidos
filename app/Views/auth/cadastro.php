<h1>Cadastro</h1>

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

    <button>Cadastrar</button>
    <a href="/login">Já tenho conta</a>
</form>