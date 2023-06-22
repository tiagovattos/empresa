<?php

use BLL\dalCliente;

include_once 'C:\xampp\htdocs\empresa\BLL\bllCliente.php';
$bll = new \BLL\bllCliente();
$lstCliente = $bll->Select();
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

    <title>Listar Clientes</title>
</head>

<body>
    <?php include '../menu.php'; ?>

    <h1 class="center">Clientes</h1>
    <table class="highlight blue lighten-3">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>CPF</th>
            <th>DATA NASCIMENTO</th>
            <th>EMAIL</th>
        </tr>

        <?php
        foreach ($lstCliente as $cliente) {
        ?>
            <tr>
                <td><?php echo $cliente->getId(); ?></td>
                <td><?php echo $cliente->getNome(); ?></td>
                <td><?php echo $cliente->getCpf(); ?></td>
                <td><?php echo $cliente->getDataNascimento(); ?></td>
                <td><?php echo $cliente->getEmail(); ?></td>
                <td>
                    <a class="waves-effect waves-light yellow darken-3 btn" onclick="JavaScript:location.href='editarCliente.php?id=' + <?php echo $cliente->getId(); ?>">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </td>
                <td>
                    <a class="waves-effect waves-light red btn" onclick="JavaScript: remover(<?php echo $cliente->getId(); ?>)">
                        <i class="fas fa-trash-alt"></i>
                    </a>

                </td>
            </tr>
        <?php
        }
        ?>

    </table>

    <div class="botao-adicionar">
        <a class="waves-effect waves-light green btn left" onclick="JavaScript:location.href='formInsClientes.php'">
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
        if (confirm('Excluir o Cliente ' + id + '?')) {
            location.href = 'deletarCliente.php?id=' + id;
        }
    }
</script>