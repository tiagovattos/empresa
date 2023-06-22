<?php
    namespace BLL;
    use DAL\dalCliente;
    include_once "../../DAL/dalCliente.php";

    class bllCliente {
        public function Select(){
            $dal = new \DAL\dalCliente();
            return $dal->Select();
        }

        public function Insert(\MODEL\Cliente $cliente){
            $dal = new \DAL\dalCliente();
            return $dal->Insert($cliente);
        }

        public function Delete (int $id){
            $dal = new \DAL\dalCliente(); 
            $dal->Delete($id);
         }
    }

?> 