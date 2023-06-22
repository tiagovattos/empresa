<?php
    include_once '../../MODEL/Categoria.php';
    include_once '../../BLL/bllCategoria.php';

   $categoria = new \MODEL\Categoria(); 
   
   $categoria->setDescricao($_POST['txtDescricao']);
   $categoria->setQntdProdutos($_POST['qntdProdutos']);


   $bll = new \BLL\bllCategoria(); 
   $bll->Insert($categoria); 
   
   header("location: listarCategorias.php");
  
?>