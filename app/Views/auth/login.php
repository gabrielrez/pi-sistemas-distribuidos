<h1>Login</h1>

<form action="/login" method="POST">
    <div class="input">
        <label for="email">E-mail</label>
        <input type="email" name="email" placeholder="Seu E-mail" required>
    </div>
    <div class="input">
        <label for="senha">Senha</label>
        <input type="password" name="senha" placeholder="Sua Senha" required>
    </div>

    <button>Login</button>
    <a href="/cadastro">Não tenho conta</a>
</form>