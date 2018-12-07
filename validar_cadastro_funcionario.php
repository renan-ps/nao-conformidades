<?php
	include "header.php";
	require "usuario.class.php";

	if(isset($_POST['validador'])){

		$usuario = $_POST['usuario'];
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$cargo = $_POST['cargo'];
		$senha = sha1($_POST['senha']);
		$csenha = sha1($_POST['csenha']);
		$setor = $_POST['setor'];

		$novoFuncionario = new Usuario();

		if($novoFuncionario->setVerificarCadastro($pdo, $usuario, $email) > 0){ /* Verifica se o usuário e/ou e-mail já está cadastrado */
			
			$_SESSION['msg_erro_cadastro'] = "<p style='color: red;'>Usuário e/ou e-mail já cadastrado(s).</p>";
			echo "<script> history.go(-1) </script>";
		}

		elseif(strlen($_POST['usuario']) < 5){ /* Se o número de caracteres for menor que 5, dá a mensagem de erro */
			$_SESSION['msg_erro_cadastro'] = "<p style='color: red;'>Preencha o campo usuário com pelo menos 5 caracteres.</p>";
			echo "<script> history.go(-1) </script>";
		}

		elseif($senha == "" || $csenha = ""){
			$_SESSION['msg_erro_cadastro'] = "<p style='color: red;'>Preencha as senhas corretamente.</p>";
			echo "<script> history.go(-1) </script>";
		}

		elseif($_POST['senha'] != $_POST['csenha']){
			$_SESSION['msg_erro_cadastro'] = "<p style='color: red;'>Preencha as senhas corretamente.</p>";
			echo "<script> history.go(-1) </script>";
		}

		elseif(strlen($_POST['senha']) < 8){
			$_SESSION['msg_erro_cadastro'] = "<p style='color: red;'>Preencha as senhas corretamente.</p>";
			echo "<script> history.go(-1) </script>";
		}

		else{
			$novoFuncionario->setCadastro($pdo, $usuario, $nome, $email, $cargo, $senha, $setor);
			$_SESSION['msg_erro_cadastro'] = "<p style='color: green;'>Usuário cadastrado com sucesso.</p>";
			header("Location: cadastrar.php");
		}

	}

	else{
		header("Location: cadastrar.php");
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