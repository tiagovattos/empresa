<?php
    $errorMessage = $_GET['error'] ?? '';
    if (!empty($errorMessage)) {
        echo '<p style="color: red;">Erro: ' . $errorMessage . '</p>';
    }
?>


<?php
include_once 'C:\xampp\htdocs\empresa\BLL\bllProduto.php';
$id = $_GET['id'];

$bll = new \BLL\bllProduto();
$produto = $bll->SelectID($id);
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

    <title>Editar Produto</title>
</head>

<body>
    <?php include_once '../menu.php'; ?>

    <h1 class="center">Editar Produto</h1>

    <div class="container">
        <form action="recEditarProduto.php" method="POST" id="formEditarProduto">
            <div class="input-field">
                <input type="hidden" name="txtID" value="<?php echo $id; ?>">
                <label for="id">Id: <?php echo $produto->getId(); ?></label>
            </div>
            <br><br>
            <div class="input-field">
                <input type="text" id="nome" name="txtNome" value="<?php echo $produto->getNome(); ?>" class="validate">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field">
                <input type="number" id="id_categoria" name="txtIdCategoria" value="<?php echo $produto->getIdCategoria(); ?>" class="validate">
                <label for="id_categoria">ID Categoria</label>
            </div>
            <div class="input-field">
                <input type="number" step="0.01" id="valor" name="txtValor" value="<?php echo $produto->getValor(); ?>" class="validate">
                <label for="valor">Valor</label>
            </div>
            <div class="input-field">
                <input type="number" id="quantidade_estoque" name="txtQuantidadeEstoque" value="<?php echo $produto->getQuantidadeEstoque(); ?>" class="validate">
                <label for="quantidade_estoque">Quantidade em Estoque</label>
            </div>
            <button class="btn waves-effect waves-light green" type="submit" name="action">Enviar</button>
            <a class="btn waves-effect waves-light red" href="listarProdutos.php">
                Voltar
            </a>
        </form>
    </div>
    <?php include_once '../rodape.php'; ?>
</body>

</html>
