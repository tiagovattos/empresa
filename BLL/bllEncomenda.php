<?php
namespace BLL;

use DAL\dalEncomenda;
use DAL\dalProduto;

include_once "../../DAL/dalEncomenda.php";
include_once "../../DAL/dalProduto.php";

class bllEncomenda {
    public function Select() {
        $dal = new \DAL\dalEncomenda();
        return $dal->Select();
    }

    public function SelectID(int $id) {
        $dal = new \DAL\dalEncomenda();
        return $dal->SelectID($id);
    }

    public function Insert(\MODEL\Encomenda $encomenda) {
        $dalEncomenda = new \DAL\dalEncomenda();
        $dalProduto = new \DAL\dalProduto();

        $produto = $dalProduto->SelectID($encomenda->getIdProduto());

        $novaQuantidade = $produto->getQuantidadeEstoque() + $encomenda->getQuantidade();
        $produto->setQuantidadeEstoque($novaQuantidade);

        $dalEncomenda->Insert($encomenda);
        $dalProduto->Update($produto);
    }

    public function Update(\MODEL\Encomenda $encomenda) {
        $dalEncomenda = new \DAL\dalEncomenda();
        $dalEncomenda->Update($encomenda);
    }

    public function Delete(int $id) {
        $dalEncomenda = new \DAL\dalEncomenda();
        $dalEncomenda->Delete($id);
    }
}
?>
