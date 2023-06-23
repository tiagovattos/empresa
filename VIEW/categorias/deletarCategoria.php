<?php
    include_once '../../MODEL/Categoria.php';
    include_once '../../BLL/bllCategoria.php';
    try{
        $id = $_GET['id'];
        $bll = new \BLL\bllCategoria(); 
        $bll->Delete($id); 
        header("location: listarCategorias.php");
    } catch (\PDOException $e) {
        if ($e->getCode() === '23000') { // tem produtos cadastrads
            header("location: listarCategorias.php?error= Categoria tem produtos cadastrados");
        } else {  // outros erros
            header("location: listarCategorias.php?error=unknown");
        }
    }
?>