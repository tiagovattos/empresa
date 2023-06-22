<?php
include_once 'C:\xampp\htdocs\empresa\BLL\bllCliente.php';
$id = $_GET['id'];

$bll = new  \BLL\bllCliente();
$cliente = $bll->SelectID($id);
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

    <title>Editar Cliente</title>
</head>

<body>
    <?php include_once '../menu.php'; ?>    

    <h1 class="center">Editar Cliente</h1>

    <div class="container">
        <form action="recEditarCliente.php" method="POST" id="formInsCliente">
            <div class="input-field">
                <input type="hidden" name="txtID" value=<?php echo $id; ?>>
                <label for="id">Id: <?php echo $cliente->getId(); ?></label>
            </div>
            <BR></BR>
            <div class="input-field">
                <input type="text" id="nome" name="txtNome" value="<?php echo $cliente->getNome() ?>" class="validate">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field">
                <input type="text" id="cpf" name="txtCpf" value="<?php echo $cliente->getCpf() ?>" class="validate">
                <label for="cpf">CPF</label>
            </div>
            <div class="input-field">
                <input type="email" id="email" name="txtEmail" value="<?php echo $cliente->getEmail() ?>" class="validate">
                <label for="email">E-mail</label>
            </div>
            <div class="input-field">
                <input type="date" id="data_nascimento" name="txtDataNascimento" value="<?php echo $cliente->getDataNascimento() ?>" class="validate">
                <label for="data_nascimento">Data de nascimento</label>
            </div>
            <button class="btn waves-effect waves-light green" type="submit" name="action">Enviar</button>
        </form>
    </div>

    
</body>

</html> 