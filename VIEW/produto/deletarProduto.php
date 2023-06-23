<?php
    include_once '../../MODEL/Produto.php';
    include_once '../../BLL/bllProduto.php';

    $id = $_GET['id'];

    $bll = new \BLL\bllProduto(); 
    $bll->Delete($id); 

    header("location: listarProdutos.php");
?>
