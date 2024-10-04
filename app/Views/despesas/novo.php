<h1>Nova Despesa</h1>

<form action="/despesas" method="POST">
    <div class="input">
        <label for="categoria">Categoria</label>
        <select name="categoria" id="categoria_select">
            <option value="alimentacao">Alimentação</option>
            <option value="moradia">Moradia</option>
            <option value="transporte">Transporte</option>
            <option value="educacao">Educação</option>
            <option value="saude">Saúde</option>
            <option value="lazer">Lazer</option>
            <option value="vestuario">Vestuário</option>
            <option value="higiene">Higiene</option>
            <option value="seguros">Seguros</option>
            <option value="impostos">Impostos</option>
            <option value="emprestimo">Empréstimo</option>
            <option value="doacao">Doação</option>
            <option value="outros">Outros</option>
        </select>
    </div>
    <div class="input">
        <label for="valor">Valor</label>
        <input type="number" placeholder="00.00 R$" name="valor">
    </div>
    <div class="input">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="descricao_text_area"></textarea>
    </div>
    <button>Adicionar</button>
</form>
