<?php
    include_once '../../MODEL/Produto.php';
    include_once '../../BLL/bllProduto.php';

    try {
        $produto = new \MODEL\Produto();
       
        $produto->setNome($_POST['txtNome']);
        $produto->setIdCategoria($_POST['txtIdCategoria']);
        $produto->setValor($_POST['txtValor']);
        $produto->setQuantidadeEstoque($_POST['txtQuantidadeEstoque']);

        $bll = new \BLL\bllProduto();
        $bll->Insert($produto);

        header("location: listarProdutos.php");
    } catch (\PDOException $e) {
        if ($e->getCode() === '23000') { // chave estrangeira
            header("location: formInsProduto.php?error=foreign_key");
        } else {  // outros erros
            header("location: formInsProduto.php?error=unknown");
        }
    }
?>
