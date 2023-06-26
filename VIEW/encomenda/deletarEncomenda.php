<?php
include_once '../../MODEL/Encomenda.php';
include_once '../../BLL/bllEncomenda.php';

$id = $_GET['id'];

$bll = new \BLL\bllEncomenda();
$bll->Delete($id);

header("location: listarEncomendas.php");
?>
