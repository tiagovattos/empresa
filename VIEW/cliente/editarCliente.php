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
            <a class="btn waves-effect waves-light red" href="listarClientes.php">
                Voltar
            </a>
        </form>
    </div>
    <?php include_once '../rodape.php'; ?>

    <script>
        // Função para validar o CPF
        function validarCPF(cpf) {
            cpf = cpf.replace(/[^\d]+/g, '');

            if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
                return false;
            }

            var soma = 0;
            for (var i = 0; i < 9; i++) {
                soma += parseInt(cpf.charAt(i)) * (10 - i);
            }

            var resto = 11 - (soma % 11);
            if (resto === 10 || resto === 11) {
                resto = 0;
            }

            if (resto !== parseInt(cpf.charAt(9))) {
                return false;
            }

            soma = 0;
            for (i = 0; i < 10; i++) {
                soma += parseInt(cpf.charAt(i)) * (11 - i);
            }

            resto = 11 - (soma % 11);
            if (resto === 10 || resto === 11) {
                resto = 0;
            }

            if (resto !== parseInt(cpf.charAt(10))) {
                return false;
            }

            return true; 
        }

        function validarEmail(email) {
            var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email);
        }

        // Validação em tempo real ao digitar
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('formInsCliente');
            var cpfInput = document.getElementById('cpf');
            var emailInput = document.getElementById('email');

            cpfInput.addEventListener('input', function() {
                var cpfValue = cpfInput.value;
                var cpfError = document.getElementById('cpf-error');

                if (validarCPF(cpfValue)) {
                    cpfError.textContent = '';
                    cpfInput.classList.remove('invalid');
                    cpfInput.classList.add('valid');
                } else {
                    cpfError.textContent = 'CPF inválido';
                    cpfInput.classList.remove('valid');
                    cpfInput.classList.add('invalid');
                }
            });

            emailInput.addEventListener('input', function() {
                var emailValue = emailInput.value;
                var emailError = document.getElementById('email-error');

                if (validarEmail(emailValue)) {
                    emailError.textContent = '';
                    emailInput.classList.remove('invalid');
                    emailInput.classList.add('valid');
                } else {
                    emailError.textContent = 'E-mail inválido';
                    emailInput.classList.remove('valid');
                    emailInput.classList.add('invalid');
                }
            });

            form.addEventListener('submit', function(event) {
                var cpfValue = cpfInput.value;
                var emailValue = emailInput.value;

                if (!validarCPF(cpfValue)) {
                    event.preventDefault();
                    alert('CPF inválido');
                }

                if (!validarEmail(emailValue)) {
                    event.preventDefault();
                    alert('E-mail inválido');
                }
            });
        });
    </script>

</body>

</html>