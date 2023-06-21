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
    }
