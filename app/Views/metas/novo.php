<h1>Nova Receita</h1>

<a href="/dashboard">Voltar</a>
<br>
<br>

<form action="/metas" method="POST">
    <div class="input">
        <label for="valor_alvo">Valor</label>
        <input type="number" name="valor_alvo" placeholder="00.00 R$">
    </div>
    <div class="input">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="descricao_text_area"></textarea>
    </div>
    <div class="input">
        <label for="data_meta">Data estimada</label>
        <input type="date" name="data_meta">
    </div>
    <input type="hidden" name="id_usuario" value="<?= sessao()->pegar('usuario.id') ?>">
    <button>Adicionar</button>
</form>