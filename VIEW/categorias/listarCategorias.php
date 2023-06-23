<?php
    $errorMessage = $_GET['error'] ?? '';
    if (!empty($errorMessage)) {
        echo '<p style="color: red;">Erro: ' . $errorMessage . '</p>';
    }
?>

<?php

use BLL\bllCategoria;

include_once 'C:\xampp\htdocs\empresa\BLL\bllCategoria.php';
$bll = new \BLL\bllCategoria();
$lstCategoria = $bll->Select();

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

    <title>Listar Categorias</title>
</head>

<body>
    <?php include_once '../menu.php'; ?>

    <h1 class="center">Categorias</h1>
    <table class="highlight blue lighten-3">
        <tr>
            <th>ID</th>
            <th>DESCRICAO</th>
        </tr>

        <?php
        foreach ($lstCategoria as $categoria) {
        ?>
            <tr>
                <td><?php echo $categoria->getId(); ?></td>
                <td><?php echo $categoria->getDescricao(); ?></td>
                <td>
                    <a class="waves-effect waves-light yellow darken-3 btn" onclick="JavaScript:location.href='editarCategoria.php?id=' + <?php echo $categoria->getId(); ?>">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </td>
                <td>
                    <a class="waves-effect waves-light red btn" onclick="JavaScript: remover(<?php echo $categoria->getId(); ?>)">
                        <i class="fas fa-trash-alt"></i>
                    </a>

                </td>
            </tr>
        <?php
        }
        ?>

    </table>

    <div class="botao-adicionar">
        <a class="waves-effect waves-light green btn left" onclick="JavaScript:location.href='formInsCategorias.php'">
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
        if (confirm('Excluir a Categoria ' + id + '?')) {
            location.href = 'deletarCategoria.php?id=' + id;
        }
    }
</script>