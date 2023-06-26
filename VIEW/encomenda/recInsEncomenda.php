<?php
    include_once '../../MODEL/Encomenda.php';
    include_once '../../BLL/bllEncomenda.php';

    try {
        $encomenda = new \MODEL\Encomenda();

        $encomenda->setFornecedor($_POST['txtFornecedor']);
        $encomenda->setDataPedido(date('Y-m-d'));
        $encomenda->setIdProduto($_POST['txtIdProduto']);
        $encomenda->setQuantidade($_POST['txtQuantidade']);

        $bll = new \BLL\bllEncomenda();
        $bll->Insert($encomenda);

        header("location: listarEncomendas.php");
    } catch (\PDOException $e) {
        if ($e->getCode() === '23000') { // chave estrangeira
            header("location: formInsEncomenda.php?error=foreign_key");
        } else {  // outros erros
            header("location: formInsEncomenda.php?error=unknown");
        }
    }
?>
