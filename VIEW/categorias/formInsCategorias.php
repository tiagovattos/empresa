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

    <title>Inserir Categoria</title>
</head>

<body>
    <?php include_once '../menu.php'; ?>    

    <h1 class="center">Inserir Categoria</h1>

    <div class="container">
        <form action="recInsCategorias.php" method="POST" id="formInsCategoria">
            <div class="input-field">
                <input type="text" id="descricao" name="txtDescricao" class="validate">
                <label for="descricao">Descricao</label>
            </div>
            <button class="btn waves-effect waves-light green" type="submit" name="action">Enviar</button>
            <a class="btn waves-effect waves-light red" href="listarCategorias.php">
                Voltar
            </a>
        </form>
    </div>
    <?php include_once '../rodape.php'; ?>
    
</body>

</html> 