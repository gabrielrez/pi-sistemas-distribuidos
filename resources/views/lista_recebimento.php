
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    
<title>Listagem Recebimento</title>
</head>
<body>
<div class="container">
        <div class="tittle-entidades"><p>Listagem Recebimentos</p></div>

        <div class="listagem-entidades">
			<p>Recebimento no periodo</p>
			<select name="Mes" id="id-mes" class="meses">
				<option value="0" disabled selected>Mes</option>
				<option value="1">Janeiro</option>
				<option value="1">Fevereiro</option>
				<option value="1">MarÇo</option>
				<option value="1">Abril</option>
				<option value="1">Maio</option>
				<option value="1">Junho</option>
				<option value="1">Julho</option>
				<option value="1">Agosto</option>
				<option value="1">Setembro</option>
				<option value="1">Outubro</option>
				<option value="1">Novembro</option>
				<option value="1">Dezembro</option>
			</select>

			 <div class="lista-container">           
                    <input type="text"  placeholder="R$:   "/>
             </div>
             
			<p>Recebimento total do mes</p>
        </div>
		
		<c:if test="${not empty msg }">
			<div class="alert alert-success">${msg}</div>
		</c:if>
		<c:if test="${not empty erro }">
			<div class="alert alert-danger">${erro}</div>
		</c:if>
		
		<div id="tabela">
        <table class="table table-striped">
			<tr class="cabecalho">
				<th>Valor</th>
				<th>Descri��o</th>
				<th>Data</th>
				<th></th>
			</tr>
			<c:forEach items="${recebimentos}" var="r">
				<tr>
					<td>${r.valor}</td>
					<td>${r.descricao}</td>
					<td>
						<fmt:formatDate value="${r.dtRecebimento.time }" pattern="dd/MM/yyyy"/>
					</td>
					<td>
						<c:url value="recebimento" var="link">
							<c:param name="acao" value="abrir-form-edicao"/>
							<c:param name="codigoRecebimento" value="${r.codigoRecebimento}"/>
						</c:url>
						<a class="editar" href="${link}">Editar</a>
						<button type="button" class="excluir" data-toggle="modal" data-target="#excluirModal" onclick="codigoExcluir.value = ${r.codigoRecebimento}">
  							Excluir
						</button>
					</td>
				</tr>
			</c:forEach>
		</table>
		</div>

		<form action="menu-principal" method="post">
        <div class="meus-botoes">
           
            <a href="menu-principal.jsp">
                <img src="image/RESUMO.png" alt="�cone 1"> Resumo
            </a>
            <a href="cadastro-gasto.jsp">
                <img src="image/GASTOS.png" alt="�cone 2"> Gastos
            </a>
            <a href="cadastro-recebimento.jsp">
                <img src="image/RECEBIMENTOS.png" alt="�cone 3"> Recebimentos
            </a>
            <a href="cadastro-investimento.jsp">
                <img src="image/INVESTIMENTOS.png" alt="�cone 4"> Investimentos
            </a>
            <a href="cadastro-objetivofinanceiro.jsp">
                <img src="image/OBJFINANCEIRO.png" alt="�cone 5">ObjFinanceiro
            </a>
        </div>
        </form> 
	</div>
	
	<script type="text/javascript" src="resources/js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="resources/js/bootstrap.min"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	

		<div class="modal fade" id="excluirModal" tabindex="-1" role="dialog"
			aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content"
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Confirma��o</h5>
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">Deseja realmente excluir o
						recebimento?</div>
					<div class="modal-footer">
						<form action="recebimento" method="post">
  							<input type="hidden" name="acao" value="excluir"> 
							<input type="hidden" name="codigoRecebimento" id="codigoExcluir">
							<button type="button" class="btn btn-secondary"
								data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-danger">Excluir</button>
						</form>
					</div>
				</div>
			</div>
		</div>


</body>
</html>
