<?php
    include_once "../BLL/bllUsuario.php";

    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);

    echo "Usuario: " . $usuario . "<br>";
    echo "Senha: " . md5($senha) . "<br>";

    $bll = new \BLL\bllUsuario();
    $objUsuario = $bll->SelectUser($usuario);

    if($objUsuario->getUsuario() != null){
        if(md5($senha) == $objUsuario->getSenha()){
            session_start();
            $_SESSION['login'] = $objUsuario->getUsuario();
            header("location:paginaInicial.php");
        } else header("location:index.php");
    } else {
        header("location:index.php");
    }
?>