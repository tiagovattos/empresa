<?php
    namespace DAL;

use PDO;

    include_once 'Conexao.php';
    include_once 'C:\xampp\htdocs\empresa\MODEL\Cliente.php';

    class dalCliente {
        public function Select(){
            $con = Conexao::conectar();
            $sql = 'select * from cliente;';
            $result = $con->query($sql);
            $con = Conexao::desconectar();

            foreach($result as $linha){
                $cliente = new \MODEL\Cliente();

                $cliente->setId($linha['id']);
                $cliente->setNome($linha['nome']);
                $cliente->setCpf($linha['cpf']);
                $cliente->setDataNascimento($linha['data_nascimento']);
                $cliente->setEmail($linha['email']);

                $lstCliente[] = $cliente;
            }
            return $lstCliente;
        }

        public function Insert(\MODEL\Cliente $cliente){
            $con = Conexao::conectar(); 
            $sql = "INSERT INTO cliente (nome, cpf, data_nascimento, email) 
                   VALUES  ('{$cliente->getNome()}', '{$cliente->getCpf()}',
                            '{$cliente->getDataNascimento()}', '{$cliente->getEmail()}');";
     
            $result = $con->query($sql); 
            $con = Conexao::desconectar();
            return $result; 

        }

        public function Delete(int $id){
            $sql = "DELETE FROM cliente WHERE id=?";

            $pdo = Conexao::conectar(); 
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
            $query = $pdo->prepare($sql);
            $result = $query->execute(array($id));
            $con = Conexao::desconectar();
            return  $result; 
        }

    }
