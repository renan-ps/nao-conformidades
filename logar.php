<?php
	
	include 'conexao.php';
	include 'usuario.class.php';
	session_start();
	
	$user = $_POST['usuario'];
	$senha = sha1($_POST['senha']);

	$usuario = new Usuario();
	print_r ($usuario->setLogin($pdo, $user, $senha));

	if($usuario->getLogado() == true){
		$_SESSION['username'] = $usuario->getUsuario();
		$_SESSION['nome'] = $usuario->getNome();
		$_SESSION['setor'] = $usuario->getIDSetor();
		$_SESSION['cargo'] = $usuario->getCargo();
		$_SESSION['logado'] = true;


	}

	echo $_SESSION['nome'];

	header('location: index.php');

?>