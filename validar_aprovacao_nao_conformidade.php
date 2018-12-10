<?php 
	include "header.php";
	require "nao_conformidade.class.php"
	if($_SESSION['setor'] == 6){

	$idNaoConformidade = $_GET['id'];
	
	$nao_conformidade = new NaoConformidade();
	$nao_conformidade->
?>




<?php
	include "footer.php";
}else{
	header("Location: index.php");
}
?>