<?php

namespace DAL;

use PDO;

include_once 'Conexao.php';
include_once 'C:\xampp\htdocs\empresa\MODEL\Produto.php';

class dalProduto {
    public function Select() {
        $con = Conexao::conectar();
        $sql = 'SELECT * FROM produto;';
        $result = $con->query($sql);
        $con = Conexao::desconectar();

        foreach ($result as $linha) {
            $produto = new \MODEL\Produto();

            $produto->setId($linha['id']);
            $produto->setNome($linha['nome']);
            $produto->setIdCategoria($linha['id_categoria']);
            $produto->setValor($linha['valor']);
            $produto->setQuantidadeEstoque($linha['qntd_estoque']);

            $lstProdutos[] = $produto;
        }

        return $lstProdutos;
    }

    public function SelectID(int $id){
        $sql = "SELECT * FROM produto WHERE id=?;";
        $pdo = Conexao::conectar(); 
        $query = $pdo->prepare($sql);
        $query->execute (array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        Conexao::desconectar(); 

        $produto = new \MODEL\Produto(); 
        $produto->setId($linha['id']);
        $produto->setNome($linha['nome']);
        $produto->setIdCategoria($linha['id_categoria']);
        $produto->setValor($linha['valor']);
        $produto->setQuantidadeEstoque($linha['qntd_estoque']);
        return $produto; 

    }

    public function Insert(\MODEL\Produto $produto){
        $con = Conexao::conectar(); 
        $sql = "INSERT INTO produto (nome, id_categoria, valor, qntd_estoque) 
               VALUES  ('{$produto->getNome()}', '{$produto->getIdCategoria()}', '{$produto->getValor()}',
                        '{$produto->getQuantidadeEstoque()}');";
 
        $result = $con->query($sql); 
        $con = Conexao::desconectar();
        return $result; 

    }

    public function Update(\MODEL\Produto $produto){
        $sql = "UPDATE produto SET nome=?, id_categoria=?, valor=?, qntd_estoque=? WHERE id=?";

        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
        $query = $pdo->prepare($sql);
        $result = $query->execute(array($produto->getNome(), $produto->getIdCategoria(), 
                                        $produto->getValor(), $produto->getQuantidadeEstoque(),
                                        $produto->getId()));
        $con = Conexao::desconectar();
        return  $result; 
    }

    public function Delete(int $id){
        $sql = "DELETE FROM produto WHERE id=?";

        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
        $query = $pdo->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();
        return  $result; 
    }
}
