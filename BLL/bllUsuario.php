<?php

    namespace BLL;
    use DAL\dalUsuario;
    include_once "../DAL/dalUsuario.php";

    class bllUsuario {

        public function SelectUser (string $usuario){
            $dal = new \DAL\dalUsuario();
            return $dal->SelectUser($usuario);
        }
    }

?> 