<?php
	include "header.php";
	require "nao_conformidade.class.php";

	if($_POST['descricao'] == ""){
		$_SESSION['msg_descricao'] = "<p style='color: red'>Por favor, preencha a descrição da não conformidade.</p>";
		header('location: abrir_nao_conformidade.php');
	}else{
		$tipo = $_POST['tipo'];
		$descricao = $_POST['descricao'];
		$status = "Aguardando validação";
		$idUsuario = $_SESSION['idUsuario'];
		$dataAbertura = "CURRENT_DATE";

		$nao_conformidade = new NaoConformidade();

		echo $nao_conformidade->setAbrirNaoConformidade($pdo, $descricao, $tipo, $status, $idUsuario);
		$_SESSION['msg_descricao'] = "<p style='color: green'>Não conformidade cadastrada com sucesso. Aguarde validação.</p>";
		header('location: abrir_nao_conformidade.php');
	}
?>