<?php
$errorMessage = $_GET['error'] ?? '';
if (!empty($errorMessage)) {
    echo '<p style="color: red;">Erro: ' . $errorMessage . '</p>';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Inserir Produtos</title>
</head>

<body>
    <?php include_once '../menu.php'; ?>

    <h1 class="center">Inserir Produto</h1>

    <div class="container">
        <form action="recInsProduto.php" method="POST" id="formInsProduto">
            <div class="input-field">
                <input type="text" id="nome" name="txtNome" class="validate">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field">
                <input type="number" id="id_categoria" name="txtIdCategoria" class="validate">
                <label for="id_categoria">ID Categoria</label>
            </div>
            <div class="input-field">
                <input type="number" step="0.01" id="valor" name="txtValor" class="validate">
                <label for="valor">Valor</label>
            </div>
            <div class="input-field">
                <input type="number" id="quantidade_estoque" name="txtQuantidadeEstoque" class="validate">
                <label for="quantidade_estoque">Quantidade em Estoque</label>
            </div>
            <button class="btn waves-effect waves-light green" type="submit" name="action">Enviar</button>
            <a class="btn waves-effect waves-light red" href="listarProdutos.php">
                Voltar
            </a>
        </form>
    </div>
    <?php include_once '../rodape.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('formInsProduto');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                const nome = document.getElementById('nome').value;
                const id_categoria = document.getElementById('id_categoria').value;
                const valor = document.getElementById('valor').value;
                const quantidade_estoque = document.getElementById('quantidade_estoque').value;

                let errorMessage = '';

                if (nome.trim() === '') {
                    errorMessage += 'O campo Nome é obrigatório.\n';
                }

                if (id_categoria.trim() === '') {
                    errorMessage += 'O campo ID Categoria é obrigatório.\n';
                }

                if (isNaN(valor) || valor <= 0) {
                    errorMessage += 'O campo Valor deve ser um número positivo.\n';
                }

                if (isNaN(quantidade_estoque) || quantidade_estoque < 0) {
                    errorMessage += 'O campo Quantidade em Estoque deve ser um número não negativo.\n';
                }

                if (errorMessage !== '') {
                    alert(errorMessage);
                    return;
                }

                form.submit();
            });
        });
    </script>


</body>

</html>