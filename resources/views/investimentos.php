<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investimentos</title>
</head>
<body>

   

    <!--  adicionar investimentos -->
    <h2>Adicionar Investimento</h2>
    <form action="/usuario/adicionarInvestimento" method="POST">
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" required><br><br>

        <label for="valor">Valor (R$):</label>
        <input type="number" id="valor" name="valor" step="0.01" required><br><br>

        <button type="submit">Adicionar Investimento</button>
    </form>

    <!-- Lista de Investimentos -->
    <h2>Seus Investimentos</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Valor (R$)</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
           
                <tr>
                    <td colspan="3">Nenhum investimento encontrado.</td>
                </tr>
            
        </tbody>
    </table>

</body>
</html>
