<?php

namespace DAL;

use PDO;

include_once 'Conexao.php';
include_once 'C:\xampp\htdocs\empresa\MODEL\Usuario.php';

class dalUsuario
{
    public function SelectUser(string $usuario)
    {
        $sql = "SELECT * FROM usuario WHERE usuario LIKE ?;";
        $pdo = Conexao::conectar();
        $query = $pdo->prepare($sql);
        $query->execute(array($usuario));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        Conexao::desconectar();

        $usuario = new \MODEL\Usuario();

        if ($linha != null) {
            $usuario->setId($linha['id']);
            $usuario->setUsuario($linha['usuario']);
            $usuario->setSenha($linha['senha']);
        }

        return $usuario;
    }
}
