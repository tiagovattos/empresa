<?php
    include_once '../../MODEL/Produto.php';
    include_once '../../BLL/bllProduto.php';

    try {
        $produto = new \MODEL\Produto();
       
        $produto->setId($_POST['txtID']);
        $produto->setNome($_POST['txtNome']);
        $produto->setIdCategoria($_POST['txtIdCategoria']);
        $produto->setValor($_POST['txtValor']);
        $produto->setQuantidadeEstoque($_POST['txtQuantidadeEstoque']);

        $bll = new \BLL\bllProduto();
        $bll->Update($produto);

        header("location: listarProdutos.php");
    } catch (\PDOException $e) {
        if ($e->getCode() === '23000') {
            header("location: editarProduto.php?id=" . $produto->getId() . "&error=foreign_key");
        } else {
            header("location: editarProduto.php?id=" . $produto->getId() . "&error=unknown");
        }
    }
?>
