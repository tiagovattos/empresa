<?php
    session_start();
    if(!isset($_SESSION['login']))
    header("location:/empresa/VIEW/index.php")
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/empresa/IMG/favicon.ico" type="image/x-icon">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="/view/js/init.js"></script>

    <title>Menu</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper purple darken-4">
            <a href="/empresa/VIEW/paginaInicial.php" class="brand-logo right">Líder</a>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="/empresa/VIEW/cliente/listarClientes.php">Clientes</a></li>
                <li><a href="/empresa/VIEW/categorias/listarCategorias.php">Categorias</a></li>
                <li><a href="/empresa/VIEW/produto/listarProdutos.php">Produtos</a></li>
                <li><a href="/empresa/VIEW/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="/view/js/materialize.js"></script>
    <script src="../init.js"></script>

</body>

</html>