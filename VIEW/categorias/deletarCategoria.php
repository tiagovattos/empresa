<?php
    include_once '../../MODEL/Categoria.php';
    include_once '../../BLL/bllCategoria.php';

   $id = $_GET['id'];


   $bll = new \BLL\bllCategoria(); 
   $bll->Delete($id); 
   
   header("location: listarCategorias.php");
  
?>