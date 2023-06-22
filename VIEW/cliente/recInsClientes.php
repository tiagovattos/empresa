<?php
    include_once '../../MODEL/Cliente.php';
    include_once '../../BLL/bllCliente.php';

   $cliente = new \MODEL\Cliente(); 
   
   $cliente->setNome($_POST['txtNome']);
   $cliente->setCpf($_POST['txtCpf']);
   $cliente->setEmail($_POST['txtEmail']); 
   $cliente->setDataNascimento($_POST['txtDataNascimento']); 


   $bll = new \BLL\bllCliente(); 
   $bll->Insert($cliente); 
   
   header("location: listarClientes.php");
  
?>