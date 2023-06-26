<?php
include_once '../../MODEL/Encomenda.php';
include_once '../../BLL/bllEncomenda.php';

try {
    $encomenda = new \MODEL\Encomenda();
   
    $encomenda->setId($_POST['txtID']);
    $encomenda->setFornecedor($_POST['txtFornecedor']);
    $encomenda->setIdProduto($_POST['txtIdProduto']);
    $encomenda->setQuantidade($_POST['txtQuantidade']);

    $bll = new \BLL\bllEncomenda();
    $bll->Update($encomenda);

    header("location: listarEncomendas.php");
} catch (\PDOException $e) {
    if ($e->getCode() === '23000') {
        header("location: editarEncomenda.php?id=" . $encomenda->getId() . "&error=foreign_key");
    } else {
        header("location: editarEncomenda.php?id=" . $encomenda->getId() . "&error=unknown");
    }
}
?>
