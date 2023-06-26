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

    <title>Inserir Clientes</title>
</head>

<body>
    <?php include_once '../menu.php'; ?>

    <h1 class="center">Inserir Cliente</h1>

    <div class="container">
        <form action="recInsClientes.php" method="POST" id="formInsCliente">
            <div class="input-field">
                <input type="text" id="nome" name="txtNome" class="validate">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field">
                <input type="text" id="cpf" name="txtCpf" class="validate">
                <label for="cpf">CPF</label>
            </div>
            <div class="input-field">
                <input type="email" id="email" name="txtEmail" class="validate">
                <label for="email">E-mail</label>
            </div>
            <div class="input-field">
                <input type="date" id="data_nascimento" name="txtDataNascimento" class="validate">
                <label for="data_nascimento">Data de nascimento</label>
            </div>
            <button class="btn waves-effect waves-light green" type="submit" name="action">Enviar</button>
            <a class="btn waves-effect waves-light red" href="listarClientes.php">
                Voltar
            </a>
        </form>
    </div>
    <?php include_once '../rodape.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('formInsCliente');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                const nome = document.getElementById('nome').value;
                const cpf = document.getElementById('cpf').value;
                const email = document.getElementById('email').value;
                const data_nascimento = document.getElementById('data_nascimento').value;

                let errorMessage = '';

                if (nome.trim() === '') {
                    errorMessage += 'O campo Nome é obrigatório.\n';
                }

                if (cpf.trim() === '') {
                    errorMessage += 'O campo CPF é obrigatório.\n';
                } else if (!validarCPF(cpf)) {
                    errorMessage += 'CPF inválido.\n';
                }

                if (email.trim() === '') {
                    errorMessage += 'O campo E-mail é obrigatório.\n';
                } else if (!validarEmail(email)) {
                    errorMessage += 'E-mail inválido.\n';
                }

                if (data_nascimento.trim() === '') {
                    errorMessage += 'O campo Data de nascimento é obrigatório.\n';
                }

                if (errorMessage !== '') {
                    alert(errorMessage);
                    return;
                }

                form.submit();
            });

            // Função para validar CPF
            function validarCPF(cpf) {
                cpf = cpf.replace(/[^\d]+/g, ''); // Remove caracteres não numéricos

                if (cpf.length !== 11) {
                    return false;
                }

                // Verifica se todos os dígitos são iguais (CPF inválido)
                if (/^(\d)\1+$/.test(cpf)) {
                    return false;
                }

                // Validação dos dígitos verificadores
                let sum = 0;
                let remainder;

                for (let i = 1; i <= 9; i++) {
                    sum += parseInt(cpf.substring(i - 1, i)) * (11 - i);
                }

                remainder = (sum * 10) % 11;

                if (remainder === 10 || remainder === 11) {
                    remainder = 0;
                }

                if (remainder !== parseInt(cpf.substring(9, 10))) {
                    return false;
                }

                sum = 0;

                for (let i = 1; i <= 10; i++) {
                    sum += parseInt(cpf.substring(i - 1, i)) * (12 - i);
                }

                remainder = (sum * 10) % 11;

                if (remainder === 10 || remainder === 11) {
                    remainder = 0;
                }

                if (remainder !== parseInt(cpf.substring(10, 11))) {
                    return false;
                }

                return true;
            }

            // Função para validar e-mail
            function validarEmail(email) {
                const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return regex.test(email);
            }
        });
    </script>


</body>

</html>