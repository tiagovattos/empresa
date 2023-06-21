<?php
    namespace BLL;
    use DAL\dalCliente;
    include_once "../../DAL/dalCliente.php";

    class bllCliente {
        public function Select(){
            $dal = new \DAL\dalCliente();
            //linhas de codigo com regras de negocio

            return $dal->Select();
        }
    }

?> 