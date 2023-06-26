<?php

namespace DAL;

use PDO;

include_once 'Conexao.php';
include_once 'C:\xampp\htdocs\empresa\MODEL\Encomenda.php';

class dalEncomenda {
    public function Select() {
        $con = Conexao::conectar();
        $sql = 'SELECT * FROM encomenda;';
        $result = $con->query($sql);
        $con = Conexao::desconectar();

        $lstEncomendas = [];

        foreach ($result as $linha) {
            $encomenda = new \MODEL\Encomenda();

            $encomenda->setId($linha['id']);
            $encomenda->setFornecedor($linha['fornecedor']);
            $encomenda->setDataPedido($linha['data_pedido']);
            $encomenda->setIdProduto($linha['id_produto']);
            $encomenda->setQuantidade($linha['quantidade']);

            $lstEncomendas[] = $encomenda;
        }

        return $lstEncomendas;
    }

    public function SelectID(int $id) {
        $sql = "SELECT * FROM encomenda WHERE id = ?;";
        $pdo = Conexao::conectar();
        $query = $pdo->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        Conexao::desconectar();

        $encomenda = new \MODEL\Encomenda();
        $encomenda->setId($linha['id']);
        $encomenda->setFornecedor($linha['fornecedor']);
        $encomenda->setDataPedido($linha['data_pedido']);
        $encomenda->setIdProduto($linha['id_produto']);
        $encomenda->setQuantidade($linha['quantidade']);

        return $encomenda;
    }

    public function Insert(\MODEL\Encomenda $encomenda) {
        $con = Conexao::conectar();
        $sql = "INSERT INTO encomenda (fornecedor, data_pedido, id_produto, quantidade)
               VALUES ('{$encomenda->getFornecedor()}', '{$encomenda->getDataPedido()}', '{$encomenda->getIdProduto()}',
                       '{$encomenda->getQuantidade()}');";

        $result = $con->query($sql);
        $con = Conexao::desconectar();

        return $result;
    }

    public function Update(\MODEL\Encomenda $encomenda) {
        $sql = "UPDATE encomenda SET fornecedor=?, data_pedido=?, id_produto=?, quantidade=? WHERE id=?";

        $pdo = Conexao::conectar();
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $query = $pdo->prepare($sql);
        $result = $query->execute(array($encomenda->getFornecedor(), $encomenda->getDataPedido(),
            $encomenda->getIdProduto(), $encomenda->getQuantidade(), $encomenda->getId()));

        $con = Conexao::desconectar();
        return $result;
    }

    public function Delete(int $id) {
        $sql = "DELETE FROM encomenda WHERE id=?";

        $pdo = Conexao::conectar();
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $query = $pdo->prepare($sql);
        $result = $query->execute(array($id));

        $con = Conexao::desconectar();
        return $result;
    }
}
