<?php
	include "header.php";
	require "usuario.class.php";

	if(isset($_POST['validador'])){

		$usuario = $_POST['usuario'];
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$cargo = $_POST['cargo'];
		$senha = sha1($_POST['senha']);
		$setor = $_POST['setor'];

		$novoFuncionario = new Usuario();
		echo $usuario;
		echo "<br>";
		echo $email;
		echo "<br>";
		echo $novoFuncionario->setVerificarCadastro($pdo, $usuario, $email);
		echo $novoFuncionario['usuario'];
		/*if($novoFuncionario->setVerificarCadastro($pdo, $_POST['usuario'], $_POST['email']) > 0){
			echo "<script> history.go(-1) </script>";

			$_SESSION['msg_cadUser'] = "<p style='color: red;'>Usuário e/ou e-mail já cadastrado(s).</p>";
		}else{

			if(strlen($_POST['usuario']) < 5){
				echo "<script> history.go(-1) </script>";
				$_SESSION['msg_cadNomeUser'] = "<p style='color: red;'>Preencha o campo usuário com pelo menos 5 caracteres.</p>";
			}

			if(isset($_POST['senha']) && isset($_POST['csenha'])){
				if($_POST['senha'] != $_POST['csenha']){
					echo "<p style='color: red;'>Preencha as senhas corretamente.</p>";
				}
			}
		}*/

	}else{
		$usuario = "";
		$nome = "";
		$email = "";
		$cargo = "";
		$senha = "";
		$setor = "";
	}

		/*if(isset($_POST['senha'])){	// <- Verifica se o usuário clicou no botão "cadastrar".
			$usuario = $_POST['usuario'];
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$cargo = $_POST['cargo'];
			$senha = sha1($_POST['senha']);
			$setor = $_POST['setor'];

			$novoFuncionario = new Usuario();

			echo $novoFuncionario->setCadastro($pdo, $usuario, $nome, $email, $cargo, $senha, $setor);

			echo "<p style='color: green;'>Usuário cadastrado com sucesso.</p>";
			header("Location: cadastrar.php");
		}*/

	

?>