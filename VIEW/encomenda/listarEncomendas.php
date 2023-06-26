
<?php

use BLL\bllEncomenda;
use BLL\bllProduto;

include_once 'C:\xampp\htdocs\empresa\BLL\bllEncomenda.php';
include_once 'C:\xampp\htdocs\empresa\BLL\bllProduto.php';

$bllEncomenda = new \BLL\bllEncomenda();
$lstEncomenda = $bllEncomenda->Select();

$bllProduto = new \BLL\bllProduto();

function formatarData($data) {
    return date('d/m/Y', strtotime($data));
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

    <title>Listar Encomendas</title>
</head>

<body>
    <?php include_once '../menu.php'; ?>

    <h1 class="center">Encomendas</h1>
    <table class="highlight blue lighten-3">
        <tr>
            <th>ID</th>
            <th>Fornecedor</th>
            <th>Data do Pedido</th>
            <th>Produto</th>
            <th>Quantidade</th>
        </tr>

        <?php
        foreach ($lstEncomenda as $encomenda) {
            $produto = $bllProduto->SelectID($encomenda->getIdProduto());
        ?>
            <tr>
                <td><?php echo $encomenda->getId(); ?></td>
                <td><?php echo $encomenda->getFornecedor(); ?></td>
                <td><?php echo formatarData($encomenda->getDataPedido()); ?></td>
                <td><?php echo $encomenda->getIdProduto() . ' - ' . $produto->getNome(); ?></td>
                <td><?php echo $encomenda->getQuantidade(); ?></td>
                <td>
                    <a class="waves-effect waves-light yellow darken-3 btn" onclick="JavaScript:location.href='editarEncomenda.php?id=' + <?php echo $encomenda->getId(); ?>">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </td>
                <td>
                    <a class="waves-effect waves-light red btn" onclick="JavaScript:remover(<?php echo $encomenda->getId(); ?>)">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>

    <div class="botao-adicionar">
        <a class="waves-effect waves-light green btn left" onclick="JavaScript:location.href='formInsEncomenda.php'">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <?php include_once '../rodape.php'; ?>
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
        if (confirm('Excluir a Encomenda ' + id + '?')) {
            location.href = 'deletarEncomenda.php?id=' + id;
        }
    }
</script>
