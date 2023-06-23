<?php
    include_once '../../MODEL/Categoria.php';
    include_once '../../BLL/bllCategoria.php';

   $categoria = new \MODEL\Categoria(); 
   
   $categoria->setId($_POST['txtID']);
   $categoria->setDescricao($_POST['txtDescricao']);

   $bll = new \BLL\bllCategoria(); 
   $bll->Update($categoria); 
   
   header("location: listarCategorias.php");
  
?>