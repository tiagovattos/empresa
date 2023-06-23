<?php

use BLL\dalProduto;

include_once 'C:\xampp\htdocs\empresa\BLL\bllProduto.php';
$bll = new \BLL\bllProduto();
$lstProduto = $bll->Select();

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

    <title>Listar Produtos</title>
</head>

<body>
    <?php include_once '../menu.php'; ?>

    <h1 class="center">Produtos</h1>
    <table class="highlight blue lighten-3">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>ID CATEGORIA</th>
            <th>VALOR</th>
            <th>QUANTIDADE EM ESTOQUE</th>
        </tr>

        <?php
        foreach ($lstProduto as $produto) {
        ?>
            <tr>
                <td><?php echo $produto->getId(); ?></td>
                <td><?php echo $produto->getNome(); ?></td>
                <td><?php echo $produto->getIdCategoria(); ?></td>
                <td><?php echo $produto->getValor(); ?></td>
                <td><?php echo $produto->getQuantidadeEstoque(); ?></td>
                <td>
                    <a class="waves-effect waves-light yellow darken-3 btn" onclick="JavaScript:location.href='editarProduto.php?id=' + <?php echo $produto->getId(); ?>">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </td>
                <td>
                    <a class="waves-effect waves-light red btn" onclick="JavaScript: remover(<?php echo $produto->getId(); ?>)">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>

    <div class="botao-adicionar">
        <a class="waves-effect waves-light green btn left" onclick="JavaScript:location.href='formInsProduto.php'">
            <i class="fas fa-plus"></i>
        </a>
    </div>

</body>

</html>

<style>
    table {
        margin-bottom: 50px;
    }

    .botao-adicionar {
        position: relative;
        bottom: 20px;
        left: 20px;
    }
</style>

<script>
    function remover(id) {
        if (confirm('Excluir o Produto ' + id + '?')) {
            location.href = 'deletarProduto.php?id=' + id;
        }
    }
</script>
