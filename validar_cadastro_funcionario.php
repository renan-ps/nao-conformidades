<?php
	
	include "header.php";
	require "usuario.class.php";

	if(isset($_POST['senha'])){	// <- Verifica se o usuário clicou no botão "cadastrar".
		$usuario = $_POST['usuario'];
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$cargo = $_POST['cargo'];
		$senha = sha1($_POST['senha']);
		$setor = $_POST['setor'];


		$novoFuncionario = new Usuario();

		echo $novoFuncionario->setCadastro($pdo, $usuario, $nome, $email, $cargo, $senha, $setor);

		$_SESSION['msg_cad'] = "<p style='color: green;'>Usuário cadastrado com sucesso.</p>";
		header("Location: cadastrar.php");

	}else{
		//Retorna para o cadastro, caso o usuário não clique no botão "cadastrar".
		$_SESSION['msg_cad'] = "<p style='color: red;'>Preencha os dados para cadastrar um usuário.</p>";
		header("Location: cadastrar.php");
	}

?>