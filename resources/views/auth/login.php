<!doctype html>
<html lang="en">

<h1>Entrar na Conta</h1>

<form id="login-form">
    <div class="input">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="Seu E-mail" required>
    </div>
    <div class="input">
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" placeholder="Sua Senha" required>
    </div>

    <button type="submit">Entrar</button>
    <a href="/cadastro" class="toggle-auth">Não tenho conta</a>
</form>

<script>
    const form = document.getElementById('login-form');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const data = {
            email: document.getElementById('email').value,
            senha: document.getElementById('senha').value,
        };

        try {
            const response = await fetch('http://localhost:8000/api/users/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            });

            const result = await response.json();
            if (response.ok) {
                alert(result.message);
                localStorage.setItem('token', result.token); 
                window.location.href = "/dashboard"; 
            } else {
                alert('Erro: ' + result.message);
            }
        } catch (error) {
            console.error('Erro na requisição:', error);
        }
    });
</script>

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

</html>
