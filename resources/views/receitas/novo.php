<!DOCTYPE html>
<html lang="ptbr">

<h1>Nova Receita</h1>

<a href="/dashboard">Voltar</a>
<br>
<br>

<form action="/receitas" method="POST">
    <div class="input">
        <label for="categoria">Categoria</label>
        <select name="categoria" id="categoria_select">
            <option value="salario">Salário</option>
            <option value="freelance">Freelance</option>
            <option value="aluguel">Aluguel</option>
            <option value="investimento">Investimento</option>
            <option value="pensao">Pensão</option>
            <option value="premio-loteria">Prêmio/Loteria</option>
            <option value="aposentadoria">Aposentadoria</option>
            <option value="heranca">Herança</option>
            <option value="venda-de-bens">Venda de bens</option>
            <option value="comissao">Comissão</option>
            <option value="emprestimo">Empréstimo</option>
            <option value="doacao">Doação</option>
            <option value="reembolso">Reembolso</option>
            <option value="outros">Outros</option>
        </select>
    </div>
    <div class="input">
        <label for="valor">Valor</label>
        <input type="number" name="valor" placeholder="00.00 R$">
    </div>
    <div class="input">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="descricao_text_area"></textarea>
    </div>
    <input type="hidden" name="id_usuario" value="<?= sessao()->pegar('usuario.id') ?>">
    <button>Adicionar</button>
</form>