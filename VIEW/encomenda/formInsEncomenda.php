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

    <title>Inserir Encomenda</title>
</head>

<body>
    <?php include_once '../menu.php'; ?>    

    <h1 class="center">Inserir Encomenda</h1>

    <div class="container">
        <form action="recInsEncomenda.php" method="POST" id="formInsEncomenda">
            <div class="input-field">
                <input type="text" id="fornecedor" name="txtFornecedor" class="validate">
                <label for="fornecedor">Fornecedor</label>
            </div>
            <div class="input-field">
                <input type="number" id="id_produto" name="txtIdProduto" class="validate">
                <label for="id_produto">ID do Produto</label>
            </div>
            <div class="input-field">
                <input type="number" id="quantidade" name="txtQuantidade" class="validate">
                <label for="quantidade">Quantidade</label>
            </div>
            <button class="btn waves-effect waves-light green" type="submit" name="action">Enviar</button>
            <a class="btn waves-effect waves-light red" href="listarEncomendas.php">
                Voltar
            </a>
        </form>
    </div>
    <?php include_once '../rodape.php'; ?>
    
</body>

</html> 
