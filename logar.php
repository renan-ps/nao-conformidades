<?php
	session_start();
	include 'conexao.php';
	include 'usuario.class.php';
	
	$usuario = $_POST['usuario'];
	$senha = sha1($_POST['senha']);

	$logarUsuario = new Usuario();
	print_r ($logarUsuario->setLogin($pdo, $usuario, $senha));

	$_SESSION['logado'] = 1;

	header('location: login.php');

?>