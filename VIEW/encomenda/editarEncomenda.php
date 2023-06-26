<?php
$errorMessage = $_GET['error'] ?? '';
if (!empty($errorMessage)) {
    echo '<p style="color: red;">Erro: ' . $errorMessage . '</p>';
}

function formatarData($data)
{
    return date('d/m/Y', strtotime($data));
}

?>

<?php
include_once 'C:\xampp\htdocs\empresa\BLL\bllEncomenda.php';
$id = $_GET['id'];

$bll = new \BLL\bllEncomenda();
$encomenda = $bll->SelectID($id);
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

    <title>Editar Encomenda</title>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('formEditarEncomenda');
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                const fornecedor = document.getElementById('fornecedor').value;
                const id_produto = document.getElementById('id_produto').value;
                const quantidade = document.getElementById('quantidade').value;

                let errorMessage = '';

                if (fornecedor.trim() === '') {
                    errorMessage += 'O campo Fornecedor é obrigatório.\n';
                }

                if (isNaN(id_produto) || id_produto <= 0) {
                    errorMessage += 'O campo ID do Produto deve ser um número positivo.\n';
                }

                if (isNaN(quantidade) || quantidade <= 0) {
                    errorMessage += 'O campo Quantidade deve ser um número positivo.\n';
                }

                if (errorMessage !== '') {
                    alert(errorMessage);
                    return;
                }

                form.submit();
            });
        });
    </script>
</head>

<body>
    <?php include_once '../menu.php'; ?>

    <h1 class="center">Editar Encomenda</h1>

    <div class="container">
        <form action="recEditarEncomenda.php" method="POST" id="formEditarEncomenda">
            <div class="input-field">
                <input type="hidden" name="txtID" value="<?php echo $id; ?>">
                <label for="id">Id: <?php echo $encomenda->getId(); ?></label>
            </div>
            <br><br>
            <div class="input-field">
                <input type="text" id="fornecedor" name="txtFornecedor" value="<?php echo $encomenda->getFornecedor(); ?>">
                <label for="fornecedor">Fornecedor: </label>
            </div>
            <div class="input-field">
                <input type="hidden" id="data_pedido" name="txtDataPedido" value="<?php echo $encomenda->getDataPedido(); ?>">
                <label for="data_pedido">Data do Pedido: <?php echo formatarData($encomenda->getDataPedido()); ?></label>
            </div>
            <br>
            <div class="input-field">
                <input type="hidden" id="id_produto" name="txtIdProduto" value="<?php echo $encomenda->getIdProduto(); ?>" class="validate">
                <label for="id_produto">ID Produto: <?php echo $encomenda->getIdProduto(); ?></label>
            </div>
            <br>
            <div class="input-field">
                <input type="hidden" id="quantidade" name="txtQuantidade" value="<?php echo $encomenda->getQuantidade(); ?>" class="validate">
                <label for="quantidade">Quantidade: <?php echo $encomenda->getQuantidade(); ?></label>
            </div>
            <br>
            <br>
            <button class="btn waves-effect waves-light green" type="submit" name="action">Enviar</button>
            <a class="btn waves-effect waves-light red" href="listarEncomendas.php">
                Voltar
            </a>
        </form>
    </div>
    <?php include_once '../rodape.php'; ?>
</body>

</html>
