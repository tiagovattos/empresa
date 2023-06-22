<?php
    namespace BLL;
    use DAL\dalCategoria;
    include_once "../../DAL/dalCategoria.php";

    class bllCategoria {
        public function Select(){
            $dal = new \DAL\dalCategoria();
            return $dal->Select();
        }

        public function SelectID (int $id){
            $dal = new \DAL\dalCategoria();
            return $dal->SelectID($id);
        }

        public function Insert(\MODEL\Categoria $categoria){
            $dal = new \DAL\dalCategoria();
            return $dal->Insert($categoria);
        }

        public function Update (\MODEL\Categoria $categoria){
            $dal = new \DAL\dalCategoria();
            $dal->Update($categoria);
         }

        public function Delete (int $id){
            $dal = new \DAL\dalCategoria();
            $dal->Delete($id);
         }
    }

?> 